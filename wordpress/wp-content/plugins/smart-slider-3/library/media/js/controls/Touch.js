(function ($, scope, undefined) {
    "use strict";
    var pointer = window.navigator.pointerEnabled || window.navigator.msPointerEnabled;

    function NextendSmartSliderControlTouch(slider, _direction, parameters) {
        this.currentAnimation = null;
        this.slider = slider;

        this._animation = slider.mainAnimation;

        this.parameters = $.extend({
            fallbackToMouseEvents: true
        }, parameters);

        this.swipeElement = this.slider.sliderElement.find('> div').eq(0);

        if (_direction == 'vertical') {
            this.setVertical();
        } else if (_direction == 'horizontal') {
            this.setHorizontal();
        }

        var initTouch = $.proxy(function () {
            var that = this;
            N2EventBurrito(this.swipeElement.get(0), {
                mouse: this.parameters.fallbackToMouseEvents,
                axis: _direction == 'horizontal' ? 'x' : 'y',
                start: function (event, start) {
                },
                move: function (event, start, diff, speed) {
                    var direction = that._direction.measure(diff);
                    if (direction != 'unknown' && that.currentAnimation === null) {
                        if (that._animation.state != 'ended') {
                            // skip the event as the current animation is still playing
                            return;
                        }
                        that.distance = [0];
                        that.swipeElement.addClass('n2-grabbing');

                        // Force the main animation into touch mode horizontal/vertical
                        that._animation.setTouch(that._direction.axis);

                        that.currentAnimation = {
                            direction: direction,
                            percent: 0
                        };
                        var isChangePossible = that.slider[that._direction[direction]](false);
                        if (!isChangePossible) {
                            return false;
                        }
                    }

                    if (that.currentAnimation) {
                        var realDistance = that._direction.get(diff, that.currentAnimation.direction);
                        that.logDistance(realDistance);
                        if (that.currentAnimation.percent < 1) {
                            var percent = Math.max(-0.99999, Math.min(0.99999, realDistance / that.slider.dimensions.slider[that._property]));
                            that.currentAnimation.percent = percent;
                            that._animation.setTouchProgress(percent);
                        }
                    }
                    return true;
                },
                end: function (event, start, diff, speed) {
                    if (that.currentAnimation !== null) {
                        var targetDirection = that.measureRealDirection();
                        var progress = that._animation.timeline.progress();
                        if (progress != 1) {

                            that._animation.setTouchEnd(targetDirection, that.currentAnimation.percent, diff.time);
                        }
                        that.swipeElement.removeClass('n2-grabbing');

                        // Switch back the animation into the original mode when our touch is ended
                        that._animation.setTouch(false);
                        that.currentAnimation = null;
                    }

                    if (Math.abs(diff.x) < 10 && Math.abs(diff.y) < 10) {
                        that.onTap(event);
                    }
                }
            });
        }, this);

        if (navigator.userAgent.toLowerCase().indexOf("android") > -1) {
            var parent = this.swipeElement.parent();
            if (parent.css('opacity') != 1) {
                this.swipeElement.parent().on('transitionend', initTouch);
            } else {
                initTouch();
            }
        } else {
            initTouch();
        }

        if (!this.parameters.fallbackToMouseEvents) {
            this.swipeElement.on('click', $.proxy(this.onTap, this));
        }

        if (this.parameters.fallbackToMouseEvents) {
            this.swipeElement.addClass('n2-grab');
        }

        slider.controls.touch = this;
    };

    NextendSmartSliderControlTouch.prototype.setHorizontal = function () {

        this._property = 'width';

        this._direction = {
            left: 'next',
            right: 'previous',
            up: null,
            down: null,
            axis: 'horizontal',
            measure: function (diff) {
                if (diff.x == 0) return 'unknown';
                return diff.x < 0 ? 'left' : 'right';
            },
            get: function (diff, direction) {
                if (direction == 'left') {
                    return -diff.x;
                }
                return diff.x;
            }
        };

        if (pointer) {
            this.swipeElement.css('-ms-touch-action', 'pan-y');
            this.swipeElement.css('touch-action', 'pan-y');
        }
    };

    NextendSmartSliderControlTouch.prototype.setVertical = function () {

        this._property = 'height';

        this._direction = {
            left: null,
            right: null,
            up: 'next',
            down: 'previous',
            axis: 'vertical',
            measure: function (diff) {
                if (diff.y == 0) return 'unknown';
                return diff.y < 0 ? 'up' : 'down';
            },
            get: function (diff, direction) {
                if (direction == 'up') {
                    return -diff.y;
                }
                return diff.y;
            }
        };

        if (pointer) {
            this.swipeElement.css('-ms-touch-action', 'pan-x');
            this.swipeElement.css('touch-action', 'pan-x');
        }
    };

    NextendSmartSliderControlTouch.prototype.logDistance = function (realDistance) {
        if (this.distance.length > 3) {
            this.distance.shift();
        }
        this.distance.push(realDistance);
    };

    NextendSmartSliderControlTouch.prototype.measureRealDirection = function () {
        var firstValue = this.distance[0],
            lastValue = this.distance[this.distance.length - 1];
        if ((lastValue >= 0 && firstValue > lastValue) || (lastValue < 0 && firstValue < lastValue)) {
            return 0;
        }
        return 1;
    };

    NextendSmartSliderControlTouch.prototype.onTap = function (e) {
        $(e.target).trigger('n2click');
    };

    scope.NextendSmartSliderControlTouch = NextendSmartSliderControlTouch;

})(n2, window);