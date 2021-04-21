<!DOCTYPE html>
<html lang="en-gb">
<head>
    <title>NadeBank - Update Video</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Daniel Rogers">
    <meta name="description" content="Video Updating">
    <meta name="keywords" content="An, effective, SEO description, of, the, page">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{asset("css/styles.css")}}>
    <link rel="stylesheet" href={{asset("css/custom.css")}}>
    <link rel="stylesheet" href={{asset("css/media.css")}}>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
<main>
    <header>
        <div class="col w24">
            <div class ="col w6 header-div">
                <a href="/"><i class="fas fa-home social-media"></i></a>
                <a href="https://www.youtube.com/channel/UC6J5Yz5ppMNo-I3mUyCExRQ" target="_blank"><i class="fab fa-youtube social-media"></i></a>
                <a href=""><i class="fab fa-twitter social-media"></i></a>
            </div>
            <h1 class="col w12 ">Update or Delete a Video</h1>
            <div class = "col w6 header-div">
                <div class="dropdown">
                    {{--<i class="fas fa-bars dropdownButton"></i>--}}
                </div>
            </div>
        </div>
    </header>
    <div id="page w23">
        <form class="form" action="" name="form" method="POST" id="form">
            @csrf
            @method('PUT')
            <ul class="errorList">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            <div class="formGroupHolder">
                <h2 class="formTitle">Location:</h2>
                <select type="text" name="location_id" id="locationDropdown" onchange="dropdownAction()" class="formField @error('location_id') isInvalid @enderror" value="{{old('location_id')}}">
                    <option value="">--Select a location--</option>
                    @foreach($locations as $location)
                        <option value="{{$location->location_id}}">{{$location->map_name}} - {{$location->location_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="formGroupHolder">
                <h2 class="formTitle">Video:</h2>
                <select type="text" name="video_id" id="videoDropdown" class="formField @error('video_id') isInvalid @enderror" value="{{old('video_id')}}">
                    <option value="">--Select a video--</option>
                </select>
            </div>
            <div class="formGroupHolder">
                <h2 class="formTitle">Video Name:</h2>
                <input type="text" name="video_name" id="video_name" class="formField @error('video_name') isInvalid @enderror" value="{{old('video_name')}}">
            </div>
            <div class="formGroupHolder">
                <h2 class="formTitle">Video Description:</h2>
                <input type="text" name="video_description" id="video_description" class="formField">
            </div>
            <div class="formGroupHolder">
                <h2 class="formTitle">Embed Link:</h2>
                <input type="text" name="embed_link" id="embed_link" class="formField @error('embed_link') isInvalid @enderror" value="{{old('embed_link')}}">
            </div>
            <div class="formGroupHolder">
                <h2 class="formTitle">Situational Uses:</h2>
                <textarea type="text" name="situation" id="situation" class="formField"></textarea>
            </div>
            <div class="formGroupHolder">
                <h2 class="formTitle">Enemy actions around the grenade:</h2>
                <textarea type="text" name="enemy_actions" id="enemy_actions" class="formField"></textarea>
            </div>
            <div id="buttonHolder">
                <button type="submit" id="submitButton" class="submitButton">Submit</button>
            </div>
        </form>
        <form class="form" action="" name="delete_form" method="POST" id="delete_form">
        @csrf
        @method('DELETE')
            <div id="buttonHolder">
                <button type="submit" id="deleteButton" class="submitButton">Delete</button>
            </div>
        </form>
    </div>
</main>
</body>
<script>
    $(document).ready(function(){
        $('#locationDropdown').change(function(){
            var id = $(this).val();
            $('#videoDropdown option:not(:first)').remove();
            $.ajax({
                url: 'dropdown/'+id,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    var length = 0;
                    if(response['data'] != null){
                        length = response['data'].length;
                    }
                    if(length > 0){
                        for(var i=0; i<length; i++){
                            var id = response['data'][i].video_id;
                            var name = response['data'][i].video_name;
                            var option = "<option value='"+id+"'>"+name+"</option>"
                            $('#videoDropdown').append(option);
                        }
                    }
                }
            })
        });

        $('#videoDropdown').change(function(){
            var id = $(this).val();
            console.log(id);
            $.ajax({
                url: 'textarea/'+id,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    var length = 0;
                    if(response['data'] != null){
                        length = response['data'].length;
                    }
                    if(length > 0){
                        for(var i=0; i<length; i++){
                            var id = response['data'][i].video_id;
                            var name = response['data'][i].video_name;
                            var desc = response['data'][i].video_description;
                            var link = response['data'][i].embed_link;
                            var situation = response['data'][i].situation;
                            var action = response['data'][i].enemy_actions;
                            $('#form').attr("action", "/update/" + id);
                            $('#delete_form').attr("action", "/delete/" + id);
                            $('#video_name').val(name);
                            $('#video_description').val(desc);
                            $('#embed_link').val(link);
                            $('#situation').val(situation);
                            $('#enemy_actions').val(action);
                        }
                    }
                }
            })
        });
    });
</script>


