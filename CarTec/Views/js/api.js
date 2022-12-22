const main = document.querySelector('main');
const loadingSpinner = document.querySelector('.spinner');

async function getMaintenances() {
  const data = await fetch('api.php');
  const response = await data.json();

  if (response.length == 0) {
    const p = document.createElement('p');
    p.style = 'text-align: center;';
    p.innerHTML = 'Não existem dados para serem exibidos'

    main.append(p);
  } else {
    const table = document.createElement('table');
    const tbody = document.createElement('tbody');

    table.classList.add('table');
    tbody.classList.add('table-body');

    response.forEach(data => {
      const tr = document.createElement('tr');
      
      tr.classList.add('table-row');

      data.forEach(item => {
        const td = document.createElement('td');
        td.innerHTML = item;

        tr.append(td)
      })

      tbody.append(tr)
    })

    table.innerHTML = `
      <thead class="table-header">
        <tr class="table-row">
          <th>Veículo</th>
          <th>Marca / Modelo</th>
          <th>Versão</th>
          <th>Serviço</th>
          <th>Data</th>
        </tr>
      </thead>
    `
    table.append(tbody)
    main.append(table)
  }
}

try {
  getMaintenances();
} catch (err) {
  console.log(err)
} finally {
  if (main.parentNode) {
    main.removeChild(loadingSpinner)
  }
}