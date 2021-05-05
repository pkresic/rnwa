using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Services;

namespace DZ003_002
{
    /// <summary>
    /// Summary description for Zaposlenici
    /// </summary>
    [WebService(Namespace = "http://localhost/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    // [System.Web.Script.Services.ScriptService]
    public class Zaposlenici : System.Web.Services.WebService
    {

        [WebMethod]
        public string GetZaposlenik(int id)
        {
            string connString = "SERVER=localhost" + ";" +
                "DATABASE=adventureworks;" +
                "UID=root;" +
                "PASSWORD=;";

            MySqlConnection cnMySQL = new MySqlConnection(connString);

            MySqlCommand cmdMySQL = cnMySQL.CreateCommand();

            MySqlDataReader reader;
            
            cmdMySQL.CommandText = $"SELECT e.EmployeeID, c.Title, c.FirstName, c.MiddleName, c.LastName, e.Gender, c.EmailAddress FROM employee e INNER JOIN contact c on e.ContactID = c.ContactID WHERE e.EmployeeID = {id}";

            cnMySQL.Open();

            reader = cmdMySQL.ExecuteReader();

            DataTable dt = new DataTable();
            dt.Load(reader);


            cnMySQL.Close();
            var row = dt.Rows[0];
            return $"{row["Title"]} {row["FirstName"]} {row["MiddleName"]} {row["LastName"]}, {row["Gender"]}, {row["EmailAddress"]}";
        }
    }
}
