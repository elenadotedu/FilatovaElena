@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Welcome ::
    @parent
@stop
<style>
    canvas#site_map {
        display:block;
        margin: 0 auto;
    }
</style>


{{-- Page content --}}
@section('content')
    <div class="row"> <canvas id="site_map" width="800" height="582"></canvas></div>

@section('body_bottom')
    <script type="text/javascript">
        var siteMap = new function ()
        {
            this.max_width = 700;
            var canvas = document.getElementById('site_map');
            var ctx = canvas.getContext('2d');

            var elements = [
                background = {
                    img: new Image(), size_x: 700, size_y: 509, rotation: 0
                },
                gear1 = {
                    img: new Image(), size_x: 50, size_y: 50, rotation: 0
                },
                gear2 = {
                    img: new Image(), size_x: 30, size_y: 30, rotation:0
                },
                child = {
                    img: new Image(), size_x: 40, size_y: 52,
                    orbit: {
                        // current state's angel
                        angle: 0,

                        // delta angle
                        d_angle: 15,

                        radius: 3,

                        // ellipse coefficients
                        e_x: 0, e_y: 1
                    }
                },
                wrench = {
                    img: new Image(), size_x: 40, size_y: 40,
                    orbit: {
                        // current state's angel
                        angle: 0,

                        // delta angle
                        d_angle: 5,

                        radius: 2,

                        // ellipse coefficients
                        e_x: 0, e_y: 0
                    }
                },
                phone = {
                    img: new Image(),
                    size_x: 40, size_y: 40,
                    orbit: {
                        // current state's angel
                        angle: 0,

                        // delta angle
                        d_angle: 5,

                        radius: 2,

                        // ellipse coefficients
                        e_x: 0, e_y: 0
                    }
                }
            ];

            this.init = function ()
            {
                canvas.width = background.size_x;
                canvas.height = background.size_y;
                background.img.src = '{{ asset('assets/images/home/site_map.jpg') }}';
                gear1.img.src = '{{ asset('assets/images/home/gear1.png') }}';
                gear2.img.src = '{{ asset('assets/images/home/gear2.png') }}';
                child.img.src = '{{ asset('assets/images/home/child.png') }}';
                wrench.img.src = '{{ asset('assets/images/home/wrench.png') }}';
                phone.img.src = '{{ asset('assets/images/home/phone.png') }}';

                window.requestAnimationFrame(draw);
            }

            function draw() {

                ctx.clearRect(0,0,canvas.width,canvas.height);

                // push state to the stack as many times as it will later be restored
                ctx.save();
                ctx.save();
                ctx.save();
                ctx.save();
                ctx.save();

                // draw background
                ctx.drawImage(background.img, 0, 0, background.size_x, background.size_y);

                /* ---------------------------------------------------
                 | Gear 1
                 ----------------------------------------------------- */

                // translate
                ctx.translate(background.size_x * 0.6 + gear1.size_x * 0.5, background.size_y * 0.41 + gear1.size_y * 0.5);

                // rotate
                gear1.rotation += 1 * Math.PI/180;
                if (gear1.rotation >= 360)
                    gear1.rotation -= 360;
                ctx.rotate(gear1.rotation);

                // draw
                ctx.drawImage(gear1.img, -gear1.size_x * 0.5, -gear1.size_y * 0.5, gear1.size_x, gear1.size_y);

                /* ---------------------------------------------------
                 | Gear 2
                 ----------------------------------------------------- */

                // undo the old roatation (leave translation to move gear relative to gear 1)
                ctx.restore();

                ctx.translate(background.size_x * 0.6 + gear1.size_x * 0.7 + gear2.size_x * 0.5, background.size_y * 0.41 + gear1.size_y * 0.7 + gear2.size_y * 0.5);

                gear2.rotation += -1.337 * Math.PI/180;
                if (gear2.rotation >= 360)
                    gear2.rotation -= 360;

                ctx.rotate(gear2.rotation);

                ctx.drawImage(gear2.img, -gear2.size_x * 0.5, -gear2.size_y * 0.5, gear2.size_x, gear2.size_y);

                /* ---------------------------------------------------
                 | Child
                 ----------------------------------------------------- */

                ctx.restore();

                child.orbit.angle += child.orbit.d_angle * Math.PI / 180;
                if (child.orbit.angle > 360)
                    child.orbit.angle -= 360;

                ctx.translate(background.size_x * 0.29 + child.size_x * 0.5 + child.orbit.e_x * child.orbit.radius * Math.cos(child.orbit.angle), background.size_y * 0.645 + child.size_y * 0.5 + child.orbit.e_y * child.orbit.radius * Math.sin(child.orbit.angle) - child.orbit.radius)

                ctx.drawImage(child.img, -child.size_x * 0.5, -child.size_y * 0.5, child.size_x, child.size_y);

                /* ---------------------------------------------------
                 | Wrench
                 ----------------------------------------------------- */

                ctx.restore();

                wrench.orbit.angle += wrench.orbit.d_angle * Math.PI / 180;
                if (wrench.orbit.angle > 360)
                    wrench.orbit.angle -= 360;

                ctx.translate(background.size_x * 0.76 + wrench.size_x * 0.5 + wrench.orbit.e_x * wrench.orbit.radius * Math.cos(wrench.orbit.angle), background.size_y * 0.77 + wrench.size_y * 0.5 + wrench.orbit.e_y * wrench.orbit.radius * Math.sin(wrench.orbit.angle) - wrench.orbit.radius)

                ctx.drawImage(wrench.img, -wrench.size_x * 0.5, -wrench.size_y * 0.5, wrench.size_x, wrench.size_y);

                /* ---------------------------------------------------
                 | Phone
                 ----------------------------------------------------- */

                ctx.restore();

                phone.orbit.angle += phone.orbit.d_angle * Math.PI / 180;
                if (phone.orbit.angle > 360)
                    phone.orbit.angle -= 360;

                ctx.translate(background.size_x * 0.78 + phone.size_x * 0.5 + phone.orbit.e_x * phone.orbit.radius * Math.cos(phone.orbit.angle), background.size_y * 0.36 + phone.size_y * 0.5 + phone.orbit.e_y * phone.orbit.radius * Math.sin(phone.orbit.angle) - phone.orbit.radius)

                ctx.drawImage(phone.img, -phone.size_x * 0.5, -phone.size_y * 0.5, phone.size_x, phone.size_y);

                ctx.restore();

                window.requestAnimationFrame(draw);
            };

            this.resize = function (factor)
            {
                canvas.width = factor * canvas.width;
                canvas.height = factor * canvas.height;

                background.size_x = factor * background.size_x;
                background.size_y = factor * background.size_y;

                gear1.size_x = factor * gear1.size_x;
                gear1.size_y = factor * gear1.size_y;

                gear2.size_x = factor * gear2.size_x;
                gear2.size_y = factor * gear2.size_y;

                child.size_x = factor * child.size_x;
                child.size_y = factor * child.size_y;
                child.orbit.radius = factor * child.orbit.radius;

                wrench.size_x = factor * wrench.size_x;
                wrench.size_y = factor * wrench.size_y;
                wrench.orbit.radius = factor * wrench.orbit.radius;

                phone.size_x = factor * phone.size_x;
                phone.size_y = factor * phone.size_y;
                phone.orbit.radius = factor * phone.orbit.radius;
            };

            this.getCanvas = function () {
                return canvas;
            }
        }

        siteMap.init();

        $( window).resize( function() {
            // get the width of the canvas's parent container
            var site_map_canvas = siteMap.getCanvas();
            var site_map_canvas_width = site_map_canvas.width;
            var site_map_parent_width = $(site_map_canvas).parent().width();

            // decrease size
            if (site_map_parent_width < site_map_canvas_width)
            {
                siteMap.resize(site_map_parent_width / site_map_canvas_width);
            }
            else
            {
                if (site_map_parent_width > siteMap.max_width)
                {
                    // if canvas is not yet up to max width
                    if (site_map_canvas_width < site_map_canvas.max_width)
                    {
                        // resize up to max width
                        siteMap.resize(site_map_canvas.max_width / site_map_canvas_width);
                    }
                }
                else
                {
                    // resize up to parent width
                    siteMap.resize(site_map_parent_width / site_map_canvas_width);
                }
            }
        });
    </script>
@stop
@stop
