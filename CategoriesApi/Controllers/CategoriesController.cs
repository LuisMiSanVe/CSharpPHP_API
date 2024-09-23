namespace CategoriesApi.Controllers;

using Microsoft.AspNetCore.Mvc;

[ApiController]
[Route("[controller]/[action]")]
public class CategoriesController : ControllerBase
{
    [HttpGet]
    public string getAllCategorias() { 
        HttpClient httpClient = new HttpClient();
        var response = httpClient.GetAsync("http://localhost/PHPProject/index.php?url=categoria");

        string result = "";
        result = response.Result.Content.ReadAsStringAsync().Result.Replace("},", "},\n").Replace("\"body\":[", "\"body\":[\n\n").Replace(",",",\n");

        return result;
    }

    [HttpGet]
    public string getCategoriaById(int Id)
    {
        HttpClient httpClient = new HttpClient();
        var response = httpClient.GetAsync("http://localhost/PHPProject/index.php?url=categoria/" + Id);

        string result = "";
        result = response.Result.Content.ReadAsStringAsync().Result.Replace("\"body\":", "\"body\":\n\n").Replace(",", ",\n");

        return result;
    }

    [HttpPost]
    public string newCategoria(string descripcion, string estatus)
    {
        HttpClient httpClient = new HttpClient();

        string jsondata = "{" +
                            "\"descripcion\":\"" + descripcion + "\"," +
                            "\"estatus\":\"" + estatus + "\"" +
                          "}";

        var content = new StringContent(jsondata, System.Text.Encoding.UTF8, "application/json");

        var response = httpClient.PostAsync("http://localhost/PHPProject/index.php?url=categoria", content);

        string result = "";
        result = response.Result.Content.ReadAsStringAsync().Result;

        return result;
    }

    [HttpDelete]
    public string deleteCategoriaById(int Id)
    {
        HttpClient httpClient = new HttpClient();
        var response = httpClient.DeleteAsync("http://localhost/PHPProject/index.php?url=categoria/" + Id);

        string result = "";
        result = response.Result.Content.ReadAsStringAsync().Result;

        return result;
    }
}

