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
                            }
                    }
                );

                return false;
            }
        );
    }
);
