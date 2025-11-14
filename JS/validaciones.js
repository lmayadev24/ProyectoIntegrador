function validar(Nom, aP, aM, Correo, User, password){
    let name = Nom.trim();
    let firsSurname = aP.trim();
    let secondSurname = aM.trim();
    let email = Correo.trim();
    let user = User.trim();
    let pass = password.trim();

    var Regex = /^[a-zA-Z0-9._%+-]+@(?:gmail|hotmail|outlook|yahoo|live|icloud|protonmail)\.(?:com|es|mx)$/;
    
    if (name === "" || firsSurname === "" || secondSurname === "" || user === "" 
        || email === "" || pass === "") {
        alert("Todos los campos son obligatorios");
        return false;
    }

    var validar = Regex.test(email);
    if(validar != true){
        alert("El correo no es valido");
        return false;
    }
    return true;
}

(() => {
    'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()