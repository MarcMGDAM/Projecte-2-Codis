package P2_Gimnas;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Scanner;

public class Gimnas {

    // private String nom;
    private String CIF;
    // private String telefon;
    ArrayList<Client> clients;
    ArrayList<Client> activitats;
    ArrayList<Client> reserves;

    // ConnexioBD bd = new ConnexioBD();

    private Scanner teclat = new Scanner(System.in);

    public Gimnas() {
        this.clients = new ArrayList<>();
        this.activitats = new ArrayList<>();
        this.reserves = new ArrayList<>();
    }

    // onnection connexioBD)
    public void gestionarGimnas() throws SQLException {

        boolean sortir = false;
        // bd.connectarBD();
        do {

            System.out.println("**************MENU GIMNÀS**************");
            System.out.println("1. Gestió del client");
            System.out.println("2. Visualització dels Clients");
            System.out.println("3. Visualitzar Actvitat del dia");
            System.out.println("4. Visualitzar Actvitats més reservades");
            System.out.println("5. Sortir de l'aplicació");
            System.out.println("***************************************");

            int opció = teclat.nextInt();
            // Et demana posar un valor a la terminal per executar X comanda
            switch (opció) {
                case 1:
                    gestióDelClient();
                    break;
                case 2:
                    visualitzacioClients();
                    break;
                case 3:
                    // activitatDia();
                    break;
                case 4:
                    // activitatsReservades();
                    break;
                case 5:
                    sortir = true;
                    break;
                default:
                    System.out.println("L'opció " + opció + " no existeix.");
            }

        } while (!sortir);

    }

    private void gestióDelClient() throws SQLException {

        boolean sortir = false;

        do {
            System.out.println("**************GESTIÓ DELS CLIENTS**************");
            System.out.println("1. Consulta un usuari");
            System.out.println("2. Donar alta un client");
            System.out.println("3. Donar de baixa un client");
            System.out.println("4. Modificar dades de un client");
            System.out.println("5. Tornar al primer menú");
            System.out.println("***********************************************");

            int opció = teclat.nextInt();
            teclat.nextLine();

            // Et demana posar un valor a la terminal per executar X comanda
            switch (opció) {
                case 1:
                    consultaClient();
                    break;
                case 2:
                    // altaClient();
                    break;
                case 3:
                    // modificarProducte();
                    break;
                case 4:
                    // eliminarProducte();
                    break;
                case 5:
                    // consultaProducte();
                case 6:
                    sortir = true;
                    break;
                default:
                    System.out.println("L'opció " + opció + " no existeix.");
            }
        } while (!sortir);

    }

    private void consultaClient() throws SQLException {
        Client c = new Client();
        c.consultaClient();
    }

    // private void altaClient() {
    // Client c = new Client();
    // c.altaClient();
    // }

    private void visualitzacioClients() throws SQLException {

        boolean sortir = false;

        do {
            System.out.println("**********VISUALITZACIÓ DELS CLIENTS**********");
            System.out.println("1. Clients ordenats per cognoms");
            System.out.println("2. Clients ordenats per edat");
            System.out.println("3. Clients ordenats per reserves fetes");
            System.out.println("***********************************************");

            int opció = teclat.nextInt();
            teclat.nextLine();

            // Et demana posar un valor a la terminal per executar X comanda
            switch (opció) {
                case 1:
                    // this.clients = ClientsOrdenatsCognoms();
                    break;
                case 2:
                    // this.clients = ClientsOrdenatsPerEdat();
                    break;
                case 3:
                    this.clients = ClientsOrdenatsPerReserves();
                    break;
                case 4:
                    sortir = true;
                    break;
                default:
                    System.out.println("L'opció " + opció + " no existeix.");
            }
        } while (!sortir);

    }

    public ArrayList<Client> ClientsOrdenatsPerReserves() throws SQLException {

        ArrayList<Client> clients = new ArrayList<>();

        ConnexioBD con = new ConnexioBD();
        con.conectarBD();

        String consulta = "SELECT COUNT(ID) as numReserves, s.nom FROM reserva_lliure r, reserva_col·lectiva, socis s WHERE =";
        PreparedStatement ps = con.connexioBD.prepareStatement(consulta);

        ResultSet rs = ps.executeQuery();

        while (rs.next()) {
            Client c1 = new Client();
            c1.cargarDadesDelClientSentencia(rs);

            clients.add(c1);

        }

        con.desconectarBD();

        return clients;

    }

}
