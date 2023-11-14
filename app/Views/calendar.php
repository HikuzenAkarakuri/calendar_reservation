<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src='fullcalendar/dist/index.global.js'></script>

    <!-- script para enviar os dados pro controller -->

    
<script>
document.getElementById('formCriarEvento').addEventListener('submit', function(e) {
    e.preventDefault();

    fetch('<?= base_url('reservas/criarEvento') ?>', {
        method: 'POST',
        body: new FormData(document.getElementById('formCriarEvento')),
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        // Faça algo com a resposta, como recarregar o calendário, exibir uma mensagem, etc.
    })
    .catch(error => {
        console.error('Erro:', error);
    });
});
</script>


    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        <?php if (isset($eventos)) : ?>
        var eventos = <?= json_encode($eventos) ?>;
          <?php else : ?>
              var eventos = []; // Se $eventos não estiver definida, inicializa como um array vazio
          <?php endif; ?>

             var calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth',
              locale: 'pt-br',
              editable: true,
              themeSystem: 'pulse',
              headerToolbar: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                    weekNumbers: '',
                    dayMaxEvents: true, // allow "more" link when too many events
                    events: eventos, // Adiciona os eventos ao calendário

    dateClick: function(info) {
            // Captura a data clicada
            var dataSelecionada = info.dateStr;

            // Exibe o modal ao clicar em um dia
            document.getElementById('id01').style.display = 'block';

            // Preenche o campo de data do modal com a data clicada
            document.getElementById('data_inicio').value = dataSelecionada;
        }

        });

        calendar.render();
      });
    </script>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
  </head>
  <body>

  <div class="container">
  <div id='calendar'></div>
  </div>

<br><br>

<div class="w3-container">
  <!-- <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Fade In Modal</button> -->

  <div id="id01" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>Faça sua Reserva</h2>
      </header>
      <div class="w3-container">
<br><br>

      <form action="<?= base_url('criarEvento') ?>" method="post">

    <label for="data_inicio">Data de Início:</label>
    <input class="w3-input w3-border w3-margin-bottom" type="datetime-local" id="data_inicio" name="data_inicio" required><br><br>

    <label for="data_fim">Data de Término:</label>
    <input class="w3-input w3-border w3-margin-bottom" type="datetime-local" id="data_fim" name="data_fim" required><br><br>

    <label for="titulo">Título:</label>
    <input class="w3-input w3-border w3-margin-bottom" type="text" id="titulo" name="titulo" required><br><br>

    <label for="descricao">Descrição:</label>
    <textarea class="w3-input w3-border w3-margin-bottom" id="descricao" name="descrição" required></textarea><br>

    <!-- Esses campos podem ser preenchidos dinamicamente ou obtidos de outra forma -->
    <label for="sala">Sala:</label>


    <!-- select das salas -->
    <select name="sala_id" id="sala_id">
    <option disabled selected>Selecione uma sala</option>
    <?php if (!empty($salas) && is_array($salas)) : ?>
        <?php foreach ($salas as $sala) : ?>
            <option value="<?= $sala->id ?>"><?= $sala->nome ?></option>
        <?php endforeach; ?>
    <?php else : ?>
        <option disabled>Nenhuma sala encontrada</option>
    <?php endif; ?>
  </select>

    <input type="hidden" id="users_id" name="users_id" value="1"><br>

    <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Criar Evento</button>

    </form>

      </div>
      <footer class="w3-container w3-teal">
        <p>.</p>
      </footer>
    </div>
  </div>
</div>



  <p><a href="dashboard"> Voltar</a></p>





      <!-- script para enviar os dados pro controller -->
<script>
document.getElementById('formCriarEvento').addEventListener('submit', function(e) {
    e.preventDefault();

    fetch('<?= base_url('reservas/criarEvento') ?>', {
        method: 'POST',
        body: new FormData(document.getElementById('formCriarEvento')),
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        // Faça algo com a resposta, como recarregar o calendário, exibir uma mensagem, etc.
    })
    .catch(error => {
        console.error('Erro:', error);
    });
});
</script>

</body>
</html>