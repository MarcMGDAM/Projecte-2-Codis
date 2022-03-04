package P2_Gimnas;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class Email {

	private String email;

	public Email(){

	}

	public Email(String email) {
		this.email = email;
	}

	public static Boolean validaEmail(String email) {
		Pattern pattern = Pattern.compile("^([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}$");
		Matcher matcher = pattern.matcher(email);
		return matcher.matches();
	}

	// Elemplo de implementación
	// public static void main(String[] args) {
	// if (!Email.validaEmail("soyEmail@invalido")) {
	// System.out.println("Email malo!!!");
	// }
	// }

	public String getEmail() {
		return email;
	}

	public boolean setEmail(String email) {
		if (validaEmail(email)) {
			this.email = email;
			return true;
		}
		return false;
	}

}
