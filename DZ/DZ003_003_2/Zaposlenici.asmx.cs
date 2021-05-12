using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data;
using System.Globalization;
using System.Linq;
using System.Text;
using System.Web;
using System.Web.Services;

namespace DZ003_003_2
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
        public string SearchZaposlenik(string query)
        {
            string connString = "SERVER=localhost" + ";" +
                "DATABASE=adventureworks;" +
                "UID=root;" +
                "PASSWORD=;";

            MySqlConnection cnMySQL = new MySqlConnection(connString);

            MySqlCommand cmdMySQL = cnMySQL.CreateCommand();

            MySqlDataReader reader;

            cmdMySQL.CommandText = $@"SELECT 
                                    e.EmployeeID, 
                                    c.Title, 
                                    c.FirstName, 
                                    c.MiddleName, 
                                    c.LastName, 
                                    e.BirthDate 
                                FROM employee e 
                                INNER JOIN contact c on e.ContactID = c.ContactID 
                                WHERE c.Title LIKE '%{query}%' 
                                OR c.FirstName LIKE '%{query}%'  
                                OR c.MiddleName LIKE '%{query}%' 
                                OR c.LastName LIKE '%{query}%' ";

            cnMySQL.Open();

            reader = cmdMySQL.ExecuteReader();

            DataTable dt = new DataTable();
            dt.Load(reader);

            cnMySQL.Close();
            var builder = new StringBuilder();
            if (dt.Rows.Count == 0)
            {
                builder.AppendLine("No results");
            }
            else
            {
                foreach (DataRow row in dt.Rows)
                {
                    var age = (new DateTime(1, 1, 1) + DateTime.Now.Subtract(DateTime.Parse(row["BirthDate"].ToString()))).Year - 1;
                    builder.AppendLine($"{row["Title"]} {row["FirstName"]} {row["MiddleName"]} {row["LastName"]}, {age}");
                }
            }
            return builder.ToString();
        }
    }
}
