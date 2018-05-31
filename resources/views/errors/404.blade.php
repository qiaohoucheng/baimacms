<!DOCTYPE html>
<html>
    <head>
        <title>页面跑丢啦！！</title>
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                    <div class="404" style="float: left">
                        <img src = "{{asset('asset/artfireadmin/img/404.png')}}"/>
                    </div>
                    <div class="404_content" style="float: left;margin-left: 10px;text-align: left;color: black">
                        <p>Oops!</p>
                        <p>当前页面不存在，点击返回</p>
                        <p><a href="/">返回</a></p>
                    </div>
                </div>

        </div>
    </body>
</html>
