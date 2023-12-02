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
    <p class="text-muted mt-4">or submit the "inp file" here:</p>
    <input type="file" name="input">

    <div class="accordion accordion-flush mt-2" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Set parameters (advanced)
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            <p><strong>Input format:</strong></p>
            <input type="radio" checked><span class="ms-2">Tabular</span>
            <input type="radio" class="ms-5" disabled><span class="ms-2 text-muted">Separated by commas (unavailable)</span>
            <input type="radio" class="ms-5" disabled><span class="ms-2 text-muted">Separated by semicolon (unavailable)</span>
        </div>
    </div>
  </div>
  
</div>

    <input type="submit" class="btn btn-success mt-3 mb-5 w-100" value="Run">
</form>

<?= $this->endSection() ?>
