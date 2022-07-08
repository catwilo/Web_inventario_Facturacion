<?php
if (isset($_SESSION['message'])) :
?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Listo!</strong><?= $_SESSION['message']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php
    unset($_SESSION['message']);
endif;
?>