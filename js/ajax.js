const formularios_ajax=document.querySelectorAll(".FormularioAjax");

function enviar_formulario_ajax(e){
    e.preventDefault();

   /*  let enviar=confirm("Quieres enviar el formulario"); */

   Swal.fire({
    title: "Deseas guardar?",
    text: "se guardara directamente",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, guardar!"
  }).then((result) => {
    if (result.isConfirmed) {

        let data= new FormData(this);
        let method=this.getAttribute("method");
        let action=this.getAttribute("action");
        console.log(action);
        let encabezados= new Headers();

        let config={
            method: method,
            headers: encabezados,
            mode: 'cors',
            cache: 'no-cache',
            body: data
        };

        fetch(action,config)
        .then(respuesta => respuesta.text())
        .then(respuesta =>{ 
            let contenedor=document.querySelector(".form-rest");
            contenedor.innerHTML = respuesta;

            /*---------------------- ADMINISTRADOR INSERTAR ------------------------*/
            const administradorElement = document.getElementById('administrador');
            if (administradorElement) {
                const dataSaveValue = administradorElement.getAttribute('data-save');
                console.log(dataSaveValue);
                if (dataSaveValue === 'true') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            window.location.href = '/INVENTARIO_BETA/index.php?vista=user_list';
                        }
                    });
                    
                    Toast.fire({
                        icon: "success",
                        title: "Administrador Registrado con éxito!"
                    });
                }
            }
            /*---------------------- ADMINISTRADOR ACTUALIZAR ------------------------*/
            const administrador_actualizarElement = document.getElementById('administrador_actualizar');
            if (administrador_actualizarElement) {
                const dataSaveValue = administrador_actualizarElement.getAttribute('data-save');
                console.log(dataSaveValue);
                if (dataSaveValue === 'true') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            window.location.href = '/INVENTARIO_BETA/index.php?vista=user_list';
                        }
                    });
                    
                    Toast.fire({
                        icon: "success",
                        title: "Administador Actualizado con éxito!"
                    });
                }
            }

            /*-------------------USUARIO R INSERTAR ------------------------*/
            const usuarioRElement = document.getElementById('usuario_R');
            if (usuarioRElement) {
                const dataSaveValue = usuarioRElement.getAttribute('data-save');
                console.log(dataSaveValue);
                if (dataSaveValue === 'true') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            window.location.href = '/INVENTARIO_BETA/index.php?vista=usuarioR_list';
                        }
                    });
                    
                    Toast.fire({
                        icon: "success",
                        title: "Usuario R Registrado con éxito!"
                    });
                }
            }
            /*-------------------USUARIO R - ACTUALIZAR------------------------*/
            const usuarioRactualizarElement = document.getElementById('usuario_R_actualizar');
            if (usuarioRactualizarElement) {
                const dataSaveValue = usuarioRactualizarElement.getAttribute('data-save');
                console.log(dataSaveValue);
                if (dataSaveValue === 'true') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            window.location.href = '/INVENTARIO_BETA/index.php?vista=usuarioR_list';
                        }
                    });
                    
                    Toast.fire({
                        icon: "success",
                        title: "Usuario R Actualizado con éxito!"
                    });
                }
            }


            /*-------------------USUARIO D------------------------*/
            const usuarioDElement = document.getElementById('usuario_D');
            if (usuarioDElement) {
                const dataSaveValue = usuarioDElement.getAttribute('data-save');
                console.log(dataSaveValue);
                if (dataSaveValue === 'true') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            window.location.href = '/INVENTARIO_BETA/index.php?vista=usuarioD_list';
                        }
                    });
                    
                    Toast.fire({
                        icon: "success",
                        title: "Usuario D Registrado con éxito!"
                    });
                }
            }
             /*-------------------USUARIO D ACTUALIZADO------------------------*/
             const usuarioDactualizadoElement = document.getElementById('usuario_D_actualizado');
             if (usuarioDactualizadoElement) {
                 const dataSaveValue = usuarioDactualizadoElement.getAttribute('data-save');
                 console.log(dataSaveValue);
                 if (dataSaveValue === 'true') {
                     const Toast = Swal.mixin({
                         toast: true,
                         position: "top-end",
                         showConfirmButton: false,
                         timer: 3000,
                         timerProgressBar: true,
                         didOpen: (toast) => {
                             toast.onmouseenter = Swal.stopTimer;
                             toast.onmouseleave = Swal.resumeTimer;
                         },
                         didClose: () => {
                             window.location.href = '/INVENTARIO_BETA/index.php?vista=usuarioD_list';
                         }
                     });
                     
                     Toast.fire({
                         icon: "success",
                         title: "Usuario D Actualizado con éxito!"
                     });
                 }
             }


            /*-------------------USUARIO U------------------------*/
            const usuarioUElement = document.getElementById('usuario_U');
            if (usuarioUElement) {
                const dataSaveValue = usuarioUElement.getAttribute('data-save');
                console.log(dataSaveValue);
                if (dataSaveValue === 'true') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            window.location.href = '/INVENTARIO_BETA/index.php?vista=usuarioU_list';
                        }
                    });
                    
                    Toast.fire({
                        icon: "success",
                        title: "Usuario U registrado con éxito!"
                    });
                }
            }
            /*-------------------USUARIO U------------------------*/
            const usuarioUactualizadoElement = document.getElementById('usuario_U_actualizado');
            if (usuarioUactualizadoElement) {
                const dataSaveValue = usuarioUactualizadoElement.getAttribute('data-save');
                console.log(dataSaveValue);
                if (dataSaveValue === 'true') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            window.location.href = '/INVENTARIO_BETA/index.php?vista=usuarioU_list';
                        }
                    });
                    
                    Toast.fire({
                        icon: "success",
                        title: "Usuario U Actualizado con éxito!"
                    });
                }
            }


            /*-------------------USUARIO N INSERTAR ------------------------*/
            const usuarioNElement = document.getElementById('usuario_N');
            if (usuarioNElement) {
                const dataSaveValue = usuarioNElement.getAttribute('data-save');
                console.log(dataSaveValue);
                if (dataSaveValue === 'true') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            window.location.href = '/INVENTARIO_BETA/index.php?vista=usuarioN_list';
                        }
                    });
                    
                    Toast.fire({
                        icon: "success",
                        title: "Usuario N Registrado con éxito!"
                    });
                }
            }
            /*------------------- USUARIO N ACTUALIZAR ------------------------*/
            const usuarioNactualizarElement = document.getElementById('usuario_N_actualizar');
            if (usuarioNactualizarElement) {
                const dataSaveValue = usuarioNactualizarElement.getAttribute('data-save');
                console.log(dataSaveValue);
                if (dataSaveValue === 'true') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            window.location.href = '/INVENTARIO_BETA/index.php?vista=usuarioN_list';
                        }
                    });
                    
                    Toast.fire({
                        icon: "success",
                        title: "Usuario N Actualizado con éxito!"
                    });
                }
            }


            /*---------------------- ASESORES INSERTAR ------------------------*/
            const usuarioAsesorElement = document.getElementById('usuario_asesor');
            if (usuarioAsesorElement) {
                const dataSaveValue = usuarioAsesorElement.getAttribute('data-save');
                console.log(dataSaveValue);
                if (dataSaveValue === 'true') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            window.location.href = '/INVENTARIO_BETA/index.php?vista=asesor_list';
                        }
                    });
                    
                    Toast.fire({
                        icon: "success",
                        title: "Asesor registrado con éxito!"
                    });
                }
            }
            /*---------------------- ASESORES ACTUALIZAR ------------------------*/
            const usuarioAsesorActualizarElement = document.getElementById('usuario_asesor_actualizar');
            if (usuarioAsesorActualizarElement) {
                const dataSaveValue = usuarioAsesorActualizarElement.getAttribute('data-save');
                console.log(dataSaveValue);
                if (dataSaveValue === 'true') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            window.location.href = '/INVENTARIO_BETA/index.php?vista=asesor_list';
                        }
                    });
                    
                    Toast.fire({
                        icon: "success",
                        title: "Asesor Actualizado con éxito!"
                    });
                }
            }


            /*---------------------- CATEGORIA INSERTAR ------------------------*/
            const categoriaElement = document.getElementById('categoria');
            if (categoriaElement) {
                const dataSaveValue = categoriaElement.getAttribute('data-save');
                console.log(dataSaveValue);
                if (dataSaveValue === 'true') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            window.location.href = '/INVENTARIO_BETA/index.php?vista=category_list';
                        }
                    });
                    
                    Toast.fire({
                        icon: "success",
                        title: "Categoria Registrado con éxito!"
                    });
                }
            }

            /*---------------------- CATEGORIA ACTUALIZAR ------------------------*/
            const categoriaActualizarElement = document.getElementById('categoria_actualizar');
            if (categoriaActualizarElement) {
                const dataSaveValue = categoriaActualizarElement.getAttribute('data-save');
                console.log(dataSaveValue);
                if (dataSaveValue === 'true') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            window.location.href = '/INVENTARIO_BETA/index.php?vista=category_list';
                        }
                    });
                    
                    Toast.fire({
                        icon: "success",
                        title: "Categoria Actualizada con éxito!"
                    });
                }
            }

             /*---------------------- EQUIPO INSERTAR ------------------------*/
             const equipoElement = document.getElementById('equipo');
             if (equipoElement) {
                 const dataSaveValue = equipoElement.getAttribute('data-save');
                 console.log(dataSaveValue);
                 if (dataSaveValue === 'true') {
                     const Toast = Swal.mixin({
                         toast: true,
                         position: "top-end",
                         showConfirmButton: false,
                         timer: 3000,
                         timerProgressBar: true,
                         didOpen: (toast) => {
                             toast.onmouseenter = Swal.stopTimer;
                             toast.onmouseleave = Swal.resumeTimer;
                         },
                         didClose: () => {
                             window.location.href = '/INVENTARIO_BETA/index.php?vista=equipo_list';
                         }
                     });
                     
                     Toast.fire({
                         icon: "success",
                         title: "Equipo Registrado con éxito!"
                     });
                 }
             }

             /*---------------------- EQUIPO ACTUALIZAR ------------------------*/
             const equipoActualizarElement = document.getElementById('equipo_actualizar');
             if (equipoActualizarElement) {
                 const dataSaveValue = equipoActualizarElement.getAttribute('data-save');
                 console.log(dataSaveValue);
                 if (dataSaveValue === 'true') {
                     const Toast = Swal.mixin({
                         toast: true,
                         position: "top-end",
                         showConfirmButton: false,
                         timer: 3000,
                         timerProgressBar: true,
                         didOpen: (toast) => {
                             toast.onmouseenter = Swal.stopTimer;
                             toast.onmouseleave = Swal.resumeTimer;
                         },
                         didClose: () => {
                             window.location.href = '/INVENTARIO_BETA/index.php?vista=equipo_list';
                         }
                     });
                     
                     Toast.fire({
                         icon: "success",
                         title: "Equipo Actualizado con éxito!"
                     });
                 }
             }

             /*---------------------- CELULAR INSERTAR ------------------------*/
             const celularElement = document.getElementById('celular');
             if (celularElement) {
                 const dataSaveValue = celularElement.getAttribute('data-save');
                 console.log(dataSaveValue);
                 if (dataSaveValue === 'true') {
                     const Toast = Swal.mixin({
                         toast: true,
                         position: "top-end",
                         showConfirmButton: false,
                         timer: 3000,
                         timerProgressBar: true,
                         didOpen: (toast) => {
                             toast.onmouseenter = Swal.stopTimer;
                             toast.onmouseleave = Swal.resumeTimer;
                         },
                         didClose: () => {
                             window.location.href = '/INVENTARIO_BETA/index.php?vista=celular_list';
                         }
                     });
                     
                     Toast.fire({
                         icon: "success",
                         title: "Celular Registrado con éxito!"
                     });
                 }
             }

             /*---------------------- CELULAR ACTUALIZAR ------------------------*/
             const celularActualizarElement = document.getElementById('celular_actualizar');
             if (celularActualizarElement) {
                 const dataSaveValue = celularActualizarElement.getAttribute('data-save');
                 console.log(dataSaveValue);
                 if (dataSaveValue === 'true') {
                     const Toast = Swal.mixin({
                         toast: true,
                         position: "top-end",
                         showConfirmButton: false,
                         timer: 3000,
                         timerProgressBar: true,
                         didOpen: (toast) => {
                             toast.onmouseenter = Swal.stopTimer;
                             toast.onmouseleave = Swal.resumeTimer;
                         },
                         didClose: () => {
                             window.location.href = '/INVENTARIO_BETA/index.php?vista=celular_list';
                         }
                     });
                     
                     Toast.fire({
                         icon: "success",
                         title: "Celular Actualizado con éxito!"
                     });
                 }
             }

        });
    }
  });

   /* 
    if(enviar==true){

      
    } */

}

formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit",enviar_formulario_ajax);

});