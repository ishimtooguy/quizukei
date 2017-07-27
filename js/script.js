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
                                $('#result').html(html);

                                setHoverBehavior();
                            }
                    }
                );

                return false;
            }
        );

        setHoverBehavior();
    }
);

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
            $('#sentenceEn').slideToggle();
        }
    );
}
