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
    $('#helpJpnText').show(100);
    $('#helpJpnText').animate({right:'150px', top:'30px'}, 1000);
    $('#helpJpnText').delay(3000);
    $('#helpJpnText').slideUp(500);
}

function showHelpRandom()
{
    $('#helpRandom').delay(5000);
    $('#helpRandom').slideDown(500);
    $('#helpRandom').animate({right:'80px', top:'220px'}, 1000);
    $('#helpRandom').delay(3000);
    $('#helpRandom').slideUp(500);
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
