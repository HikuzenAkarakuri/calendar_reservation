<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script src='fullcalendar/dist/index.global.js'></script>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
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

  <p><a href="dashboard"> Voltar</a></p>

</body>
</html>