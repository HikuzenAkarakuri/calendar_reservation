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
  // CÓDIGO PRA ABRIR DETALHES QUANDO CLICA EM CIMA DO COISO
  // Lógica para exibir o modal de detalhes do evento ao clicar sobre ele no calendário
function exibirModalDetalhes(evento) {
    document.getElementById("detalhesTitulo").textContent = evento.title;
    document.getElementById("detalhesDataInicio").textContent = evento.start;
    document.getElementById("detalhesDataFim").textContent = evento.end;

    var modal = document.getElementById("modalDetalhesEvento");
    modal.style.display = "block";



    // Criação do botão "Deletar" com atributo 'data-id' contendo o ID do evento
    var botaoDeletar = document.createElement("button");
    botaoDeletar.textContent = "Deletar";
    botaoDeletar.setAttribute("data-id", evento.id); // Armazena o ID do evento no atributo 'data-id'
    botaoDeletar.addEventListener("click", function() {
        var eventoId = this.getAttribute("data-id"); // Obtém o ID do evento do atributo 'data-id'
        deletarEvento(eventoId); // Chama a função deletarEvento passando o ID do evento
    });

    document.getElementById("modalDetalhesEvento").appendChild(botaoDeletar);




    // Ação ao clicar no botão "Editar"
    document.getElementById("editarEventoBtn").addEventListener("click", function() {
        modal.style.display = "none"; // Esconder o modal de detalhes ao abrir o modal de edição
        abrirModalEdicao(evento);
    });

    // Ação ao clicar no botão de fechar
    var spanClose = document.getElementsByClassName("close")[0];
    spanClose.onclick = function() {
        modal.style.display = "none";
    };

    // Fechar o modal se clicar fora dele
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
}


// AGORA O CÓDIGO PRA ABRIR O MODAL DE EDIÇÃO



// Lógica para abrir o modal de edição do evento
function abrirModalEdicao(evento) {
  console.log(evento)
    // Preencher os campos do modal de edição com os dados atuais do evento
    document.getElementById("editarTitulo").value = evento.title;
    document.getElementById("editarDataInicio").value = evento.start;
    document.getElementById("editarDataFim").value = evento.end;
  document.getElementById('formEditarEvento').action =  'reservas/atualizarEvento/' + evento.defId;
    var modal = document.getElementById("modalEditarEvento");
    modal.style.display = "block";

    // Ação ao clicar no botão de fechar
    var spanClose = document.getElementsByClassName("close")[1];
    spanClose.onclick = function() {
        modal.style.display = "none";
    };

    // Fechar o modal se clicar fora dele
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };

    // Ação ao submeter o formulário de edição
    document.getElementById("formEditarEvento").addEventListener("submit", function(e) {
        e.preventDefault();

        // Coletar os dados atualizados do evento do formulário
        var novoTitulo = document.getElementById("editarTitulo").value;
        var novaDataInicio = document.getElementById("editarDataInicio").value;
        var novaDataFim = document.getElementById("editarDataFim").value;

        // Enviar os dados atualizados para o backend (controller) via AJAX
        fetch('reservas/atualizarEvento/' + evento.id, {
            method: 'POST',
            body: JSON.stringify({
                titulo: novoTitulo,
                data_inicio: novaDataInicio,
                data_fim: novaDataFim
                // Adicione outros campos conforme necessário
            }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data); // Mensagem de sucesso ou erro do backend
            modal.style.display = "none"; // Esconder o modal de edição após salvar
            // Recarregar a página ou atualizar o calendário para refletir as alterações
            // window.location.reload(); // Descomente esta linha se deseja recarregar a página inteira
            // Atualizar o calendário de acordo com a resposta do backend
            // Exemplo: atualizarCalendario();
        })
        .catch(error => {
            console.error('Erro:', error);
            // Lógica para lidar com erros
        });
    });
}


// E AGORA O CÓDIGO PRA ATUALIZAR



// Função para enviar os dados atualizados do evento para o backend
function atualizarEvento(evento) {
    var novoTitulo = document.getElementById("editarTitulo").value;
    var novaDataInicio = document.getElementById("editarDataInicio").value;
    var novaDataFim = document.getElementById("editarDataFim").value;

    // Aqui você constrói o objeto com os dados a serem enviados
    var dadosAtualizados = {
        titulo: novoTitulo,
        data_inicio: novaDataInicio,
        data_fim: novaDataFim,
        // Adicione outros campos conforme necessário para a atualização
    };

    // Fazendo a requisição AJAX para o controlador PHP
    fetch('reservas/atualizarEvento/' + evento.id, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(dadosAtualizados),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Resposta do servidor:', data);
        // Lógica para atualizar o calendário ou a página após a atualização no backend
        // Por exemplo:
        // window.location.reload(); // Recarregar a página
        // ou
        // atualizarCalendario(); // Atualizar o calendário
    })
    .catch(error => {
        console.error('Erro:', error);
        // Lógica para lidar com erros de requisição
    });
}



// CÓDIGO PARA ENVIAR AS INFORMAÇÕES PRADELETAR O EVENTO PRO CONTROLLER



function deletarEvento(eventoId) {
        if (confirm("Tem certeza que deseja deletar este evento?")) {
            fetch('reservas/deletarEvento/' + eventoId, {
                method: 'DELETE' // Envie uma requisição DELETE para deletar o evento
            })
            .then(response => {
                if (response.ok) {
                    alert('Evento deletado com sucesso!');
                    // Realizar ações após a exclusão, se necessário
                    // Por exemplo, recarregar o calendário ou página
                    window.location.reload(); // Recarregar a página
                } else {
                    alert('Erro ao deletar o evento.');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
            });
        }
    }



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

                    eventClick: function(info) {
                    // Ao clicar no evento, chama a função para exibir o modal de detalhes
                    exibirModalDetalhes(info.event);
                },

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



<!-- MODAL PARA CRIAR A DESGRAÇA DOS EVENTOS -->
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
</form></div>
    <footer class="w3-container w3-teal">
        <p>.</p>
      </footer>
</div></div></div>



  <p><a href="dashboard"> Voltar</a></p>




      <!-- MODAL PRA MOSTRAR OS DETALHES DOS EVENTOS -->

      <!-- Estrutura do modal de detalhes -->
        
        <div id="modalDetalhesEvento" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Detalhes do Evento</h2>
                <!-- Campos para mostrar os detalhes do evento -->
                <p><strong>Título:</strong> <span id="detalhesTitulo"></span></p>
                <p><strong>Data de Início:</strong> <span id="detalhesDataInicio"></span></p>
                <p><strong>Data de Término:</strong> <span id="detalhesDataFim"></span></p>
                <!-- Adicione outros campos conforme necessário -->

                <!-- botão que leva pra função editar eventos la em cima -->
                <button id="editarEventoBtn">Editar</button>

                <!-- botão de deletar -->
                <button onclick="deletarEvento(<?= $evento->id ?? '' ?>)">Deletar</button>

            </div>
        </div>


                    <!-- MODAL PARA EDITAR OS EVENTOS -->

                    <!-- Estrutura do modal de edição -->
        <div id="modalEditarEvento" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Editar Evento</h2>
                <form id="formEditarEvento" action="<?= base_url('atualizarEvento') ?>" method="post">
                    <!-- Campos para editar os detalhes do evento -->
                    <label for="editarTitulo">Título:</label>
                    <input type="text" id="editarTitulo" name="titulo" required><br>

                    <label for="editarDataInicio">Data de Início:</label>
                    <input type="datetime-local" id="editarDataInicio" name="data_inicio" required><br>

                    <label for="editarDataFim">Data de Término:</label>
                    <input type="datetime-local" id="editarDataFim" name="data_fim" required><br>

                    <!-- Adicione outros campos conforme necessário -->

                    <button type="submit">Salvar</button>
                </form>
            </div>
        </div>



        
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