package P2_Gimnas;

import java.sql.Connection;
import java.sql.SQLException;

public class GimnasApp {

    public static void main(String[] args) throws SQLException {

        // Creem el Gimnas
        Gimnas g = new Gimnas();

        g.gestionarGimnas();

        // this.dni > teclat.nextint();
    }
}
