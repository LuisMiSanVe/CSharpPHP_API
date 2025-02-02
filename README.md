> [See in spanish/Ver en español](https://github.com/LuisMiSanVe/CSharpPHP_API/blob/main/README.es.md)
# 🌐 C# - PHP REST APIs Communication Project
[![image](https://img.shields.io/badge/C%23-239120?style=for-the-badge&logo=csharp&logoColor=white)](https://dotnet.microsoft.com/en-us/languages/csharp)
[![image](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![image](https://img.shields.io/badge/.NET-512BD4?style=for-the-badge&logo=dotnet&logoColor=white)](https://dotnet.microsoft.com/en-us/learn/dotnet/what-is-dotnet)
[![image](https://img.shields.io/badge/Swagger-85EA2D?style=for-the-badge&logo=Swagger&logoColor=white)](https://github.com/domaindrivendev/Swashbuckle.AspNetCore)
[![image](https://img.shields.io/badge/Xampp-F37623?style=for-the-badge&logo=xampp&logoColor=white)](https://www.apachefriends.org/es/index.html)
[![image](https://img.shields.io/badge/Apache-D22128?style=for-the-badge&logo=Apache&logoColor=white)](https://httpd.apache.org/)
[![image](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![image](https://img.shields.io/badge/Visual_Studio-5C2D91?style=for-the-badge&logo=visual%20studio&logoColor=white)](https://visualstudio.microsoft.com/)
[![image](https://img.shields.io/badge/Visual_Studio_Code-0078D4?style=for-the-badge&logo=visual%20studio%20code&logoColor=white)](https://code.visualstudio.com/)

This project consists in two REST APIs communicating in order to make more distance between the user and the database.
> [!WARNING]
> Part of the code, especially variable names or table columns, are written in Spanish. Thankfully, they're almost the same as their English equivalents.

## 📋 Prerequisites
First of all, you'll need servers to locate the REST APIs, you can manage to make it work perfectly with [XAMPP](https://www.apachefriends.org/es/index.html) or similar programs that provide local servers, so make sure you have it installed.
> [!NOTE]
> I'll use XAMPP to explain the project's functionality.

Once XAMPP is installed, copy the whole PHPProject folder and paste it into the 'htdocs' folder inside the XAMPP install route.
In Windows should be something like `C:\xampp\htdocs`

Now rise the Apache and MySQL servers in XAMPP and click 'Admin' on the MySQL section and it will open your default browser with PhpMyAdmin, the web-based database manager.

Create a new database called 'phprest' and run the following SQL command to create the main table:
```
CREATE TABLE `bas_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `estatus` varchar(15) DEFAULT NULL,
  PRIMARY KEY(`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```

Now you just need to run CategoriesApi to use the PHP REST API from the C# REST API.
## 📂 Files
PHP side:
- [index.php](https://github.com/LuisMiSanVe/CSharpPHP_API/blob/main/PHPProject/index.php): It's the main part of the program, it executes the code writen.
- [models/bas_categoria.php](https://github.com/LuisMiSanVe/CSharpPHP_API/blob/main/PHPProject/models/bas_categoria.php): has the different mehods and querys defined.
- [controllers/bas_categoria_controller.php](https://github.com/LuisMiSanVe/CSharpPHP_API/blob/main/PHPProject/controllers/bas_categoria_controller.php): contains the functions that directly execute the code in 'bas_categoria.php'.
- [config/database.php](https://github.com/LuisMiSanVe/CSharpPHP_API/blob/main/PHPProject/config/database.php): Creates the connection with the database.
- [config/definiciones.php](https://github.com/LuisMiSanVe/CSharpPHP_API/blob/main/PHPProject/config/definiciones.php): Have declared the connection parameters.

If we could make a timeline of the execution time it would be like this:
1. 'index' starts executing the code.
2. 'database' takes the connection parameters from 'definiciones' and connects to the database server.
3. From the C# REST API we try an endpoint.
4. 'index' calls 'bas_categoria_controller' to execute the order.
5. 'bas_categoria_controller' calls 'bas_categoria' and executes the code.
6. 'index' returns the result.
7. The C# REST API receives it and shows it to the user.
## 💻 Technologies used
- Programming Lenguages: [C#](https://dotnet.microsoft.com/en-us/languages/csharp), [PHP](https://www.php.net/)
- Framework: [ASP.NET Core](https://dotnet.microsoft.com/en-us/apps/aspnet) (Project made with [.Net](https://dotnet.microsoft.com/en-us/learn/dotnet/what-is-dotnet) 8.0 Framework)
- NuGets:
  - [Swashbuckle.AspNetCore](https://github.com/domaindrivendev/Swashbuckle.AspNetCore) (6.4.0)
- Other:
  - [XAMPP](https://www.apachefriends.org/es/index.html) (3.3.0)
    - [Apache](https://httpd.apache.org/)
    - [MySQL](https://www.mysql.com/) 
    - [PhpMyAdmin](https://www.phpmyadmin.net/)
- Recommended IDEs: [Visual Studio 2022](https://visualstudio.microsoft.com/) (C#), [VS Code](https://code.visualstudio.com/) (PHP)
