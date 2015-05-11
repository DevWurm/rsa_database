package main;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class programm {

	public static void main(String[] args) {
		start(); //start prozedure
	}
	private static void start(){
		BufferedReader br = new BufferedReader( new InputStreamReader(System.in));
		System.out.print("Zahlenkette : "); 
		String kette = null; //new string (of numbers)
		long zahlenkette = 0L; //new Number
		try {
			kette = br.readLine(); //read line
		} catch (IOException e) {
			System.out.println("ungültige Zeichenkette");
			e.printStackTrace();
		}
		try {
			zahlenkette = Long.parseLong(kette); //converts to long
		} catch (NumberFormatException e) {
			System.out.println("Fehler!, keine Zahlenkette");
			e.printStackTrace();
		}
		int quersumme = bildeQuersumme(kette); //calculates crossfoot of the number
		System.out.println("Quersumme : "+String.valueOf(quersumme));
		int[] schluessel = schluesselBilden(zahlenkette, quersumme); //calculates a key
		for(int i = 0; i < schluessel.length; i++){
			System.out.println(String.valueOf(i) + " = " + String.valueOf(schluessel[i]));
		}
		long verschluesselung = ersetzen(kette, schluessel); //replaces numbers with keys
		System.out.println("Schlüssel (Stufe 1) = "+ String.valueOf(verschluesselung));
		if(String.valueOf(verschluesselung).length() < 16){ //converts length
			verschluesselung = Long.parseLong(String.valueOf(verschluesselung) + 
					String.valueOf(verschluesselung).substring(0,16-String.valueOf(verschluesselung).length()));
		}
		System.out.println("Schlüssel (Stufe 2) = "+ String.valueOf(verschluesselung));
		System.out.println("Endschlüssel (Stufe 3) = "+ endverschluesselung(verschluesselung, quersumme));
		//a final encoder
		start();
	}
	private static int bildeQuersumme(String kette){ //calculate crossfoot
		int n = 0; //crossfoot
		for(int i = 0; i < kette.length(); i++){
			char c = kette.charAt(i);
			try {
				n += Character.getNumericValue(c); //adds every single number value
			} catch (Exception e) {
				System.out.println("Fehler!, keine Zahlenkette");
				e.printStackTrace();
			}
		}
		return n;
	}
	private static int[] schluesselBilden(long zahlenkette, int quersumme){ //creates key
		int[] schluessel = new int[10]; //new key array
		for(int i = 0; i <= 9; i++){
			zahlenkette += quersumme; //adds crossfoot to number
			boolean flag = false;
			while(!flag){
				zahlenkette += 1;
				flag = prim(zahlenkette); //verify prime numbers
			}
			schluessel[i] = (int) zahlenkette % 79; //makes it a bit asynchron
		}
		return schluessel;
	}
	private static boolean prim(final long value){ //verifys prime numbers
	       if (value <= 2) {
	           return (value == 2);
	       }
	       for (int i = 2; i * i <= value; i++) {
	           if (value % i == 0) {
	               return false;
	           }
	       }
	       return true;
	   }
	private static long ersetzen(String kette, int[] schluessel){ //replaces numbers with keys
		String verschluesselung = "";
		for(int i = 0; i < kette.length(); i++){
			verschluesselung += String.valueOf(schluessel[Character.getNumericValue(kette.charAt(i))]);
		}
		return Long.parseLong(verschluesselung);
	}
	private static String endverschluesselung(long verschluesselung, int quersumme){ //final encoder
		String verschluesselungB = String.valueOf(verschluesselung);
		for(int i = 0; i < (quersumme*37) % 7; i++){ //moves numbers to make it asynchron
			verschluesselungB = verschluesselungB.substring(1,String.valueOf(verschluesselung).length());
			verschluesselungB += verschluesselungB.substring(0, 1);
		}
		verschluesselungB = String.valueOf( (long) (verschluesselung + Long.parseLong(verschluesselungB) ) /2 );
		//builds average
		if(verschluesselungB.length() == 16){
			return verschluesselungB;
		}
		try {
			return verschluesselungB.substring(0, 16);
		} catch (Exception e) { //if a parsing error occures
			return String.valueOf(verschluesselung);
		}
	}

}
