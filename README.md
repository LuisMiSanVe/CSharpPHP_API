> [Ver en ingles/See in english](https://github.com/LuisMiSanVe/CSharpPHP_API/tree/main)
# 🌐 Proyectos de Comunicación entre REST APIs de C# y PHP
El proyecto consiste en dos REST APIs que se comunican entre ellas para aumentar la distancia entre el usuario y la base de datos.
## 📋 Prerequisitos
Antes de nada, necesitarás servidores para alojar las REST APIs, puedes apañartelas perfectamente con [XAMPP](https://www.apachefriends.org/es/index.html) o programas similares que permiten levantar servidores en local.
> [!NOTE]
> Usaré XAMPP para explicar la funcionalidad de los proyectos.

Una vez XAMPP esté instalado, copia la carpeta de PHPPProject y pegalo en la carpeta 'htdocs' dentro de la carpeta de instalación de XAMPP.
En Windows debería ser algo como `C:\xampp\htdocs`.

Ahora levanta los servidores de Apache y MySQL en XAMPP y dale clic a 'Admin' en la sección de MySQL lo que abrirá en tu navegador por defecto PhpAdmin, el administrador de bases de datos en web.

Crea una nueva base de datos llamada 'phprest' y ejecuta el siguiente comando SQL para crear la tabla principal:
```
CREATE TABLE `bas_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `estatus` varchar(15) DEFAULT NULL,
  PRIMARY KEY(`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```

Ahora solo tienes que ejecutar CategoriesApi para usar la REST API de PHP desde la REST API de C#
## 📂 Archivos
En PHP:
- [index.php](https://github.com/LuisMiSanVe/CSharpPHP_API/blob/main/PHPProject/index.php): Parte principal de la API, es el que ejecuta el código.
- [models/bas_categoria.php](https://github.com/LuisMiSanVe/CSharpPHP_API/blob/main/PHPProject/models/bas_categoria.php): tiene definidas las diferentes consultas y métodos.
- [controllers/bas_categoria_controller.php](https://github.com/LuisMiSanVe/CSharpPHP_API/blob/main/PHPProject/controllers/bas_categoria_controller.php): contiene las funciones que se ejecutan directamente en 'bas_categoria.php'.
- [config/database.php](https://github.com/LuisMiSanVe/CSharpPHP_API/blob/main/PHPProject/config/database.php): Crea la conexión con la base de datos.
- [config/definiciones.php](https://github.com/LuisMiSanVe/CSharpPHP_API/blob/main/PHPProject/config/definiciones.php): Tiene declarados los parametros de la conexión.

Si creasemos una linea de tiempo de la ejecución seria algo asi:
1. 'index' empieza a ejecutar el código.
2. 'database' recoge los parametros de conexión de 'definiciones' y se conecta al Servidor de la base de datos.
3. Ejecutamos el endpoint de la REST API de C#.
4. 'index' llama a 'bas_categoria_controller' para ejecutar lo pedido.
5. 'bas_categoria_controller' llama a 'bas_categoria' y ejecuta el código.
6. 'index' devuelve el resultado.
7. La REST API de C# lo recoge y lo muestra al usuario.
## 💻 Tecnologías usadas
- Lenguajes de programación: [C#](https://dotnet.microsoft.com/es-es/languages/csharp), [PHP](https://www.php.net/)
- Framework: [ASP.NET Core](https://dotnet.microsoft.com/es-es/apps/aspnet) (Proyecto creado con el Framework [.Net](https://dotnet.microsoft.com/en-us/learn/dotnet/what-is-dotnet) 8.0)
- NuGets:
  - [Swashbuckle.AspNetCore](https://github.com/domaindrivendev/Swashbuckle.AspNetCore) (6.4.0)
- Otros:
  - [XAMPP](https://www.apachefriends.org/es/index.html) (3.3.0)
    - [Apache](https://httpd.apache.org/)
    - [MySQL](https://www.mysql.com/) 
    - [PhpMyAdmin](https://www.phpmyadmin.net/)
- IDEs Recomendados:[Visual Studio 2022](https://visualstudio.microsoft.com/) (C#), [VS Code](https://code.visualstudio.com/) (PHP)
