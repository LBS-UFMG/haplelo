<!-- modelo para criação de views: copie este arquivo e apague os comentários -->
<?= $this->extend('template') ?>

<?= $this->section('scripts') ?>
<!-- adicione links para scripts aqui -->
<script>
    const local = document.querySelector('#time');

    function contar(duracao, onde) {
        let timer = duracao, minutes, seconds;

        setInterval(function () {

            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            onde.textContent = minutes + ":" + seconds;
            if (--timer < 0) {
                timer = 0;
            }
        }, 1000);
    }

    window.onload = function () {
        let duracao = 60 * 1; // Converter para segundos
        contar(duracao, local); // iniciando o timer
    };

</script>
<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>
<!-- adicione o conteúdo principal aqui -->
<div class="text-center text-muted my-5">
    <h1>Running...</h1>
    <h1 class="display-1" id="time"></h1>
    <p>Please, wait...</p>
</div>

<?= $this->endSection() ?>
