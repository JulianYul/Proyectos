  // Verifica si hay datos en localStorage y los recupera
  let citas = JSON.parse(localStorage.getItem('citas')) || [];

  // Función para guardar los datos en localStorage
  function guardarCita() {
    // Obtiene los valores del f  ormulario
    const fecha = document.getElementById('fecha').value;
    const hora = document.getElementById('hora').value;
    const nombre = document.getElementById('nombre').value;
    const email = document.getElementById('email').value;
    const dni = document.getElementById('dni').value;
    const telefono = document.getElementById('telefono').value;

    // Crea un objeto con los datos de la cita
    const nuevaCita = {
      fecha,
      hora,
      nombre,
      email,
      dni,
      telefono,
    };

    // Agrega la nueva cita al array de citas
    citas.push(nuevaCita);

    // Guarda el array actualizado en localStorage
    localStorage.setItem('citas', JSON.stringify(citas));

    // Actualiza la tabla
    actualizarTabla();
  }

  // Función para actualizar la tabla con los datos almacenados
  function actualizarTabla() {
    const tabla = document.getElementById('citas-list');

    // Limpia las filas existentes en la tabla
    tabla.innerHTML = '';

    // Itera sobre las citas y crea las filas dinámicamente
    citas.forEach((cita, index) => {
      const fila = document.createElement('tr');
      fila.innerHTML = `
        <td>${index + 1}</td>
        <td>${cita.fecha}</td>
        <td>${cita.hora}</td>
        <td>${cita.nombre}</td>
        <td>${cita.email}</td>
        <td>${cita.dni}</td>
        <td>${cita.telefono}</td>
        <td><button class="btn btn-primary" onclick="modificarCita(${index})">/</button></td>
        <td><button class="btn btn-danger" onclick="eliminarCita(${index})">X</button></td>
      `;
     
      // Agrega la fila a la tabla
      tabla.appendChild(fila);
    });
  }

 // Función para modificar una cita
 function modificarCita(index) {
    // Obtén la cita actual del array
    const citaActual = citas[index];

    // Rellena el formulario con los datos de la cita actual
    document.getElementById('fecha').value = citaActual.fecha;
    document.getElementById('hora').value = citaActual.hora;
    document.getElementById('nombre').value = citaActual.nombre;
    document.getElementById('email').value = citaActual.email;
    document.getElementById('dni').value = citaActual.dni;
    document.getElementById('telefono').value = citaActual.telefono;

    // Elimina la cita del array
    citas.splice(index, 1);

    // Actualiza el array en localStorage
    localStorage.setItem('citas', JSON.stringify(citas));

    // Actualiza la tabla
    actualizarTabla();
  }

  // Función para eliminar una cita
  function eliminarCita(index) {
    // Elimina la cita del array
    citas.splice(index, 1);

    // Actualiza el array en localStorage
    localStorage.setItem('citas', JSON.stringify(citas));

    // Actualiza la tabla
    actualizarTabla();
  }

  // Al cargar la página, actualiza la tabla con los datos almacenados
  window.onload = () => {
    actualizarTabla();
  };

  // Función para manejar el evento submit del formulario
  function onSubmitForm(event) {
    // Evita que el formulario se envíe y recargue la página
    event.preventDefault();

    // Llama a la función para guardar la cita
    guardarCita();
  }

  // Agrega un event listener al formulario
  document.getElementById('cita-form').addEventListener('submit', onSubmitForm);