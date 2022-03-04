package P2_Gimnas;

public class Dni {
    private String dni;
    private int numero;
    private char lletra;

    public Dni(String dni) {
        this.dni = dni;
    }

    public Dni() {
    }

    public boolean validarDni(String dni) {

        String lletraMajuscula = "";

        if (dni.length() != 9 || Character.isLetter(this.dni.charAt(8)) == false) {
            return false;
        }

        lletraMajuscula = (this.dni.substring(8)).toUpperCase();

        if (solnumeros(lletraMajuscula) == true && lletraDNI(lletraMajuscula).equals(lletraMajuscula)) {
            return true;
        } else {
            return false;
        }
    }

    private boolean solnumeros(String dni) {

        int i, j = 0;
        String numero = "";
        String[] numeros = { "0", "1", "2", "3", "4", "5", "6", "7", "8", "9" };

        for (i = 0; i < this.dni.length() - 1; i++) {
            numero = this.dni.substring(i, i + 1);

            for (j = 0; j < numeros.length; j++) {
                this.dni += numeros[j];
            }
        }

        if (dni.length() != 8) {
            return false;
        } else {
            return true;
        }

    }

    private String lletraDNI(String dni) {

        int miDNI = Integer.parseInt(this.dni.substring(0, 8));
        int resta = 0;
        String lletra = "";
        String[] assignacioLletra = { "T", "R", "W", "A", "G", "H", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S",
                "Q", "V", "H", "L", "C", "K", "E" };

        resta = miDNI % 23;

        lletra = assignacioLletra[resta];

        return lletra;

    }

    public void setDni(String dni) {
        this.dni = dni;
    }

    public String getDni() {
        return dni;
    }

}
