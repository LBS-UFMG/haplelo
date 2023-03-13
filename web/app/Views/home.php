<!-- modelo para criação de views: copie este arquivo e apague os comentários -->
<?= $this->extend('template') ?>

<?= $this->section('scripts') ?>
<!-- adicione links para scripts aqui -->
<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>

<h2 class="mt-4 text-muted mb-2">Welcome to HAPLELO</h2>

<form action="<?=base_url('run')?>" method="post">
    <label class="badge bg-success mb-1">New project</label>
    <textarea class="form-control" placeholder="[PASTE THE INPUT HERE...]" rows="5" name="input"></textarea>
    <!-- <p class="text-muted mt-4">or submit the "inp file" here:</p> -->
    <!-- <input type="file"> -->
    <input type="submit" class="btn btn-success mt-3 mb-5 w-100" value="Run">
</form>

<?= $this->endSection() ?>
