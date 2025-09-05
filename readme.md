# Contact App - Documentación del Proyecto
# Descripción General

**Contact App es una aplicación web para gestión de contactos desarrollada con arquitectura MVC, utilizando PHP Orientado a Objetos, PDO para la conexión a base de datos y Composer para la gestión de dependencias.
Estructura del Proyecto
text**

-CONTACT-APP/ <br><\br>
-├── Config/ <br><\br>
-│   └── Database.php <br><\br>
-├── Controllers/ <br><\br>
-│   ├── AuthController.php <br><\br>
-│   └── ContactController.php <br><\br>
-├── Models/ <br><\br>
-│   ├── Contact.php <br><\br>
-│   └── User.php <br><\br>
-├── Views/ <br><\br>
-│   ├── auth/ <br><\br>
-│   │   ├── login.php <br><\br>
-│   │   └── register.php <br><\br>
-│   ├── contacts/ <br><\br>
-│   │   ├── create.php <br><\br>
-│   │   ├── delete.php <br><\br>
-│   │   ├── edit.php <br><\br>
-│   │   ├── index.php <br><\br>
-│   │   └── layout.php <br><\br>
-├── public/ <br><\br>
-│   ├── index.php <br><\br>
-│   └── style.css <br><\br>
-├── vendor/ <br><\br>
-│   └── composer/ <br><\br>
-│       ├── autoload_classmap.php <br><\br>
-│       ├── autoload_namespaces.php <br><\br>
-│       ├── autoload_psr4.php <br><\br>
-│       ├── autoload_real.php <br><\br>
-│       ├── autoload_static.php <br><\br>
-│       ├── ClassLoader.php <br><\br>
-│       ├── LICENSE <br><\br>
-│       └── autoload.php <br><\br>
-└── composer.json (implícito) <br><\br>

#Arquitectura MVC

**Modelo (Models)**
-User.php: Maneja la lógica de negocio relacionada con los usuarios
-Contact.php: Gestiona las operaciones CRUD de los contactos

# Vista (Views)
-auth/: Vistas de autenticación (login y registro)
-contacts/: Vistas para gestión de contactos (CRUD completo)
-layout.php: Plantilla base para las vistas

# Controlador (Controllers)
-AuthController.php: Controla autenticación y autorización
-ContactController.php: Gestiona las operaciones CRUD de contactos

#Configuración
#Database.php

**Configuración de la conexión a la base de datos usando PDO:
php*

class Database {
    -private $host = 'localhost';
    -private $db_name = 'contact_app';
    -private $username = 'root';
    -private $password = '';
    -private $conn;
    
    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username, 
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }
}

# Funcionalidades CRUD
**Para Contactos:**
    -Create: Añadir nuevos contactos
    -Read: Listar y visualizar contactos
    -Update: Editar contactos existentes
    -Delete: Eliminar contactos

# Para Usuarios:
-Registro: Crear nueva cuenta
-Login: Autenticación de usuarios
-Logout: Cerrar sesión

# Tecnologías Utilizadas
PHP 7+: Lenguaje de programación del lado del servidor

PDO: Extensión para acceso a bases de datos
-MySQL: Sistema de gestión de bases de datos
-Composer: Gestor de dependencias para PHP
-HTML/CSS: Frontend básico

# Dependencias (Composer)

**El proyecto utiliza Composer para el autoloading de clases a través del estándar PSR-4.
Interfaz de Usuario**

 # La aplicación cuenta con:
-Formularios de autenticación (login/register)
-Listado de contactos
-Formularios para crear/editar contactos
-Confirmación para eliminar contactos
-Diseño responsive básico con style.css

# Flujo de la Aplicación
-Usuario accede a la aplicación
-Si no está autenticado, es redirigido al login/registro
-Una vez autenticado, puede gestionar sus contactos
-Operaciones CRUD disponibles a través de la interfaz

# Autor
** Jorge Alberto Ballestas Morales** <br><\br>
-Estudiante de Análisis y Desarrollo del Software- <br><\br>
-SENA-

# contacto
**correo Electrónico:**
[ballestasjorge66@gmail.com]
