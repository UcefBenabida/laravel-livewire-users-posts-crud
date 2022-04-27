<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="/../materialize/css/materialize.css">

    <title>Livewire Crud</title>
    <script src="/../jquery/jquery.js" ></script>
    <style>
        .post-section{

            margin-bottom: 10px;
            background-color: blueviolet;
            border-radius: 15px 15px 15px 15px;
            padding-left: -50px;
            padding-right: -50px;

            
        }

        .row-user{
            background-color: gray;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 15px 15px 15px 15px;
            box-shadow: 1px 2px 4px black;
        }
    </style>
    @livewireStyles()
</head>
<body>
    <p></p>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h2 class="center-align">Laravel Livewire Crud By Youssef Benabida</h2>
                </div>
                <div class="card-body">
                    @if (session()->has('message')))
                        <div class="alert alert-success">
                            {{ session('mressage') }}
                        </div>
                    @endif
                </div>
                @livewire('users')
            </div>
        </div>
    </div>
    <script>

        function togglePosts(id)
        {
            $(document).ready(function(){
                $("#" + id + "-posts").slideToggle();
                const content = document.getElementById(id + "-btn").innerHTML;
                if(content == "Show Posts")
                {
                    document.getElementById(id + "-btn").innerHTML = "Hide Posts";
                }
                else
                {
                    document.getElementById(id + "-btn").innerHTML = "Show Posts";
                }
            });
        }
    </script>

    <script src="/../materialize/js/materialize.js"></script>
    
    @livewireScripts()
</body>
</html>