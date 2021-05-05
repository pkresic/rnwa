using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.Services;

namespace DZ003_002
{
    /// <summary>
    /// Summary description for Konverzije
    /// </summary>
    [WebService(Namespace = "http://localhost/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    // [System.Web.Script.Services.ScriptService]
    public class Konverzije : System.Web.Services.WebService
    {

        [WebMethod]
        public float KonverzijaBAMToEUR(float value)
        {
            return value / 2f;
        }

        [WebMethod]
        public float KonverzijaEURToBAM(int value)
        {
            return value * 2f;
        }
    }
}
