$(document).ready(
    function()
    {
        $('#submit').on('click',
            function()
            {
                var datastr = 'filter=' + $('#filterInput').val();

                $.ajax(
                    {
                        type:"POST",
                        url:"../qk/query.php",
                        data:datastr,
                        cache:false,
                        success: function(html)
                            {
                                $('#helpicon').fadeOut(1);
                                $('#result').html(html);

                                setHoverBehavior();
                                setTimeout(function(){ showHelpIcon(0)}, 2500);
                            }
                    }
                );

                return false;
            }
        );

        setHoverBehavior();
        setTimeout(function(){ showHelpIcon(2)}, 2500);

        $('#help').click(
            function()
            {
                showHelpJpnText();
                showHelpRandom();
            }
        );
    }
);

function showHelpIcon(flashCount)
{
    $('#helpicon').fadeIn(1000);

    if (flashCount > 0)
    {
        for (ii=0; ii < flashCount; ii++)
        {
            $('#helpicon').fadeOut(700);
            $('#helpicon').fadeIn(700);
        }
    }
}

function showHelpJpnText()
{
    $('#helpOverlayJpn').show(500);
    $('#helpOverlayJpn').animate({top:'120px', left:'120px'}, 1000);
    $('#helpOverlayJpn').delay(3000);
    $('#helpOverlayJpn').slideUp(500);
}

function showHelpRandom()
{
    $('#helpOverlayRandom').delay(5000);
    $('#helpOverlayRandom').show(500);
    $('#helpOverlayRandom').animate({top:'270px', left:'330px'}, 1000);
    $('#helpOverlayRandom').delay(3000);
    $('#helpOverlayRandom').fadeOut(500);
}

function setHoverBehavior()
{
    $('#sentenceId').hover(
        function()
        {
            $('#lessonInfo').fadeToggle();
        }
    );

    $('#sentenceId').click(
        function()
        {
            $('#lessonInfo').fadeIn();
        }
    );

    $('#result h4').hover(
        function()
        {
            $('#qkarrow').toggleClass("rotate");
            $('#sentenceEn').slideToggle();
        }
    );
}
