<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with LeadMark landing page.">
    <meta name="author" content="Devcrud">
    <title>LeadMark Landing page | Free Bootstrap 4.3.x landing page</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + LeadMark main styles -->
	<link rel="stylesheet" href="assets/css/leadmark.css">
</head>
<body>
    <!-- Content section will be replaced by child views -->
    @yield('content')

    <!-- Include your JavaScript files at the bottom of the body tag, if needed -->
    <!-- core  -->
<script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
<script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

<!-- bootstrap 3 affix -->
<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

<!-- Isotope -->
<script src="assets/vendors/isotope/isotope.pkgd.js"></script>

<!-- LeadMark js -->
<script src="assets/js/leadmark.js"></script>
<script>
    $(document).ready(function() {
        $('.suggested-comment').on('click', function(e) {
            e.preventDefault();
            var comment = $(this).data('comment');
            $('#comment').val(comment);
        });
    });
</script>
</body>
</html>
