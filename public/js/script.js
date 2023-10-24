document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        editable: true, // habilita a edição dos eventos
        eventClick: function(info) {
            document.getElementById('modalTitle').textContent = info.event.title;
            document.getElementById('modalStart').textContent = info.event.start.toLocaleString();
            document.getElementById('modalEnd').textContent = info.event.end.toLocaleString();
            var salaId = info.event.extendedProps.sala_id;
            buscarNomeSala(salaId);
            document.getElementById('modalDescricao').textContent = info.event.extendedProps.descricao;
            document.getElementById('eventDetailsModal').dataset.eventId = info.event.id;

            var modal = document.getElementById("eventDetailsModal");
            var closeBtn = document.getElementsByClassName("close")[0];

            modal.style.display = "block";

            closeBtn.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }}})})