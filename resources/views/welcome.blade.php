<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Ship Tracker</title>
        <style>
            .formcontainer {
                width: 100%;
            }
            .textareaContainer {
                display: block;
            }
            textarea {
                width: 100%;
                height: 330px;
                margin: 0;
                padding: 0;
                border-width: 1;
            }
        </style>
    </head>
    <body class="antialiased">
        <div id="app">
            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
                <hello-world/>
            </div>
            <h1>Ship Tracker</h1>
            <p>Have anyone within the crew in question go to the dock (on any island). From there, select the "Where are my vessels" option. This will list each and every ship in that crew, as well as the current status of those ships.</p>
            
            <p>Then, use the hot-key commands "Ctrl-A" (to Select All) and then "Ctrl-C" (to Copy All). Then use the command "Ctrl-V" (Paste All) to insert the contents here.</p>
            <form method="POST" action="/">
                @csrf
                <div class="formcontainer">
            
                    <label class="textareaContainer">
                        <textarea name="ships" placeholder="Enter Ship Data Here.">@if($errors->any()){{old('ships')}}@endif</textarea>
                    </label>
                </div>
            
                <input type="submit" value="Submit">
            
            </form>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
