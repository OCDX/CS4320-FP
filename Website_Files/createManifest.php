<?php
    session_start();
/*
    if(!isset($SESSION['username'])){
        header("Location: login.php");
    }
*/
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                var next = 1;
                $(".add-more").click(function(e){
                    e.preventDefault();
                    var addto = "#file" + next;
                    var addRemove = "#file" + (next);
                    next = next + 1;
                    var newIn = '<input  class="input form-control" id="file' + next + '" type="file" name="file' + next + '">';
                    var newInput = $(newIn);
                    var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="files">';
                    var removeButton = $(removeBtn);
                    $(addto).after(newInput);
                    $(addRemove).after(removeButton);
                    $("#file" + next).attr('data-source',$(addto).attr('data-source'));
                    $("#count").val(next);  
                    
                    $('.remove-me').click(function(e){
                        e.preventDefault();
                        var fieldNum = this.id.charAt(this.id.length-1);
                        var fieldID = "#file" + fieldNum;
                        $(this).remove();
                        $(fieldID).remove();
                    });
                });
            });

        </script>
        
    </head>
    <body>
        <?php
        include_once("navbar.php");
        ?>
        <h1>Create New Manifest</h1>
        <form action="createManifest.php" method="POST">
            <div class="input-group">
                <div class="form-group">
                    <label class="inputdefault">Title</label>
                    <input class="form-control" type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label class="inputdefault">Dataset URL</label>
                    <input class="form-control" type="url" name="id" required>
                </div>
                <div class="form-group">
                    <label class="inputdefault">Creator</label>
                    <input class="form-control" type="text" name="creator" required>
                </div>
                <div class="form-group">
                    <label class="inputdefault">Abstract</label>
                    <textarea class="form-control" name="abstract" required></textarea>
                </div>
                <div class="form-group">
                    <label class="inputdefault">Oversight</label>
                    <select class="form-control" name="oversight" required>
                        <option value="IRB">IRB</option>
                        <option value="REB">REB</option>
                        <option value="REC">REC</option>
                        <option value="Not required">Not required</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="inputdefault">File</label>
                    <div id="files">
                        <input class="form-control" id="file1" type="file" name="file1">
                        <button id="b1" class="btn add-more" type="button">+</button>
                    </div>
                </div>
            </div>
            <input class="btn btn-info" type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>