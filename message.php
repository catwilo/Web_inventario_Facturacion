<?php
if (isset($_SESSION['messageSuccess'])) {
?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Listo!</strong><?= $_SESSION['messageSuccess']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php
    unset($_SESSION['messageSuccess']);
} elseif (isset($_SESSION['messageFail'])) {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong><?= $_SESSION['messageFail']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    unset($_SESSION['messageFail']);
} ?>