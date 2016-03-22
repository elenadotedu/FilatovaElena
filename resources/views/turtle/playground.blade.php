@extends('layouts.default_min')

{{-- Page title --}}
@section('title')
    Welcome ::
    @parent
@stop
<style>
textarea, canvas {
    width:100%;
    max-width: 750px;
}
canvas {
    height:280px;
}
.panel-body {
    text-align: center;
}
#instruction_board {
    height: 150px;
}
</style>


{{-- Page content --}}
@section('content')
    <h2>JavaScript Turtle</h2>
    <p>Use instructions such as turtle.forward(50).</p>
    <div class="row">
        {!! ViewHelper::sectionStart('panel-default', 'Drawing Board') !!}
            <canvas id="drawing_board" width="700" height="500"></canvas>
        {!! ViewHelper::sectionEnd('') !!}
    </div>
    <div class="row">
        {!! ViewHelper::sectionStart('panel-default', 'Instructions') !!}
            <textarea id="instruction_board" placeholder="Instructions"></textarea>
        {!! ViewHelper::sectionEnd() !!}
    </div>
@stop
@section('body_bottom')
    <script type="text/javascript">
        // scroll the window (to hide the top menu)
        $(document).ready(function () {

        });

        // when enter is pressed, run code
        $('#instruction_board').keydown(function(event) {
            if (event.keyCode == 13) {
                var val = $('#instruction_board').val();
                try {
                    eval(val);
                }
                catch (err){
                    alert("There is a bug in your code. Detals: " + err);
                }
                return true;
            }
        });

        var board = new function () {
            var canvas = document.getElementById('drawing_board');

            this.ctx = canvas.getContext('2d');

            this.width = function () {
                var cs     = getComputedStyle(canvas);
                return parseInt( cs.getPropertyValue('width'), 10);
            }
            this.height = function () {
                var cs     = getComputedStyle(canvas);
                return parseInt( cs.getPropertyValue('height'), 10);
            }

            this.clear = function () {
                this.ctx.clearRect(0,0,canvas.width,canvas.height);
            }
        }

        var turtle = {
            x: board.width() / 2,
            y: board.height() / 2,
            angleInRadians: 0,
            penDown: true,
            penColor: "#000000",
            lineWidth: 2,
            image: new Image()
        };

        turtle.init = function()
        {
            this.image.src = '{{ asset('assets/images/turtle/turtle.png') }}';
            this.image.onload= function () {
                alert('loaded');
                board.ctx.drawImage(this.image,0 , 0, 50, 50);
            }
        }

        turtle.forward = function (steps)
        {
            var x0 = this.x,
            y0 = this.y;
            this.x += steps * Math.sin(this.angleInRadians);
            this.y += steps * Math.cos(this.angleInRadians);
            if (board.ctx) {
                if (this.penDown) {
                    //this.logPenStatus();
                    board.ctx.beginPath();
                    board.ctx.lineWidth = this.lineWidth;
                    board.ctx.strokeStyle = this.penColor;
                    board.ctx.moveTo(x0, y0);
                    board.ctx.lineTo(this.x, this.y);
                    board.ctx.stroke();
                }
            } else {
                board.ctx.moveTo(this.x, this.y);
            }
        }

        turtle.init();
    </script>
@stop
