<!DOCTYPE html>

<html lang = "en">
<head>

    <meta charset="utf-8">
    <style>
        label{display: block;} .errors {color: red;}
        .ui-dialog .ui-state-error { padding: .3em; }
        .validateTips { border: 1px solid transparent; padding: 0.3em; }
    </style>
    <title>Create Board</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js" type="text/javascript"></script>

    <script type="text/javascript">
    $(function()
    {
        var dialog, form,
          name, description,
          allFields = $( [] ).add(name).add(description),
          tips = $( ".validateTips" );


        function updateTips( t ) {
          tips
            .text( t )
            .addClass( "ui-state-highlight" );
          setTimeout(function() {
            tips.removeClass( "ui-state-highlight", 1500 );
          }, 500 );
        }
     
        function checkLength( o, n, min, max ) {
          if ( o.length > max || o.length < min ) {
            // alert("Length of " + n + " must be between " +
           //    min + " and " + max + " characters.");
            o.addClass( "ui-state-error" );
            updateTips( "Length of " + n + " must be between " +
              min + " and " + max + "." );
            return false;
          } else {
            return true;
          }
        }

           function createBoard() {
          var valid = false;
          name = $('#name').val();
          description = $('#description').val();
          allFields.removeClass( "ui-state-error" );

          valid = valid && checkLength( name, "name", 1, 25 );
          valid = valid && checkLength( description, "description", 0, 254 );
          if(valid)
          {
            dialog.dialog('close'); 
          }

          return valid;
        }

        dialog = $("#message").dialog({
            autoOpen: false,
            height: 500,
            width: 650,
            modal: true,
            show: {
                effect: "fade",
                duration: 700
            },
            hide: {
                effect: "fade",
                duration: 700
            },
            buttons: {
                Cancel: function()
                {
                    dialog.dialog('close');
                },
                'Board': createBoard
            }
        });

        form = dialog.find( "form" ).on( "submit", function( event ) {
            event.preventDefault();
            createBoard();
        });

        $("#boardButton").button().on('click', function(){
            dialog.dialog("open");
        });
    });
    </script>
</head>
<body>
    <div id="message" title="Create Board">
        <?php echo form_open(); ?>
        <p>
            <?php echo form_label('Name:', 'name'); ?>
            <?php echo form_input('name', set_value('name'), 'id = name', 'class=text ui-widget-content ui-corner-all'); ?>
        </p>



        <?php
            $data = array(
                'name'          => 'content',
                'id'            => 'content',
                'class'         => 'text ui-widget-content ui-corner-all',
                'rows'          => '7',
                'cols'          => '65',
                'placeholder'   => 'Content'
            );
            echo form_label('Content:', 'content');
            echo form_textarea($data);

        ?>
        <?php echo form_submit('submit', 'Create Board', 'id=submit'); ?>
        <?php echo form_close(); ?>
    </div>
    <script type="text/javascript">
        $('#submit').on('click', function(){
            return false;
        });
    </script>
    <button id="postButton">Create Board</button>
</body>
</html>