<script>document.addEventListener('DOMContentLoaded', function() {
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