package clienteservidor;
import java.net.*;
import java.util.Scanner;
import java.io.*;

/*
 *  EJEMPLO BÁSICO DE UN CLIENTE TCP/IP
 *  Envia a hacia un servidor que usa el puerto 4444  lo que el usuario escriba y recibe el mismo texto
 *  como respuesto del servidor.
 *  Necesita el parámetro nombre o dirección IP del servidor.
 * 
 */
public class EcoCliente {

	public static final  int PUERTO = 4444;

	public static void main(String[] args) throws IOException {
		
		if (args.length == 0) {
			System.err.println(" Debe indicar el nombre o la IP del servidor");
			System.exit(1);
		}
		
		
		Socket socketCliente = null;
		BufferedReader conexionEntrada = null;
		PrintWriter ConexionSalida = null;

		// Creamos un socket en el lado cliente, enlazado con un
		// servidor que está en la misma máquina que indique como parámetro (argv[0])
		// que el cliente
		// y que escucha en el puerto
		try {
			socketCliente = new Socket(args[0], PUERTO);
			// Obtenemos el canal de entrada
			conexionEntrada = new BufferedReader(new InputStreamReader(socketCliente.getInputStream()));
			// Obtenemos el canal de salida
			ConexionSalida = new PrintWriter(
					new BufferedWriter(new OutputStreamWriter(socketCliente.getOutputStream())), true);
		} catch (IOException e) {
			System.err.println("No puede establer canales de E/S para la conexión");
			System.exit(-1);
		}
		
		System.out.println(" CLIENTE CONECTADO AL SERVIDOR: ");

		// Scaner para leer de consola del cliente
		Scanner sc = new Scanner(System.in);

		String lineaPeticion;
		String lineaRespuesta;
		// El programa cliente no analiza los mensajes enviados por el
		// usuario, simplemente los reenvía al servidor hasta que este
		// se despide con "Adios"

		try {
			while (true) {
				// Leo la entrada del usuario
				lineaPeticion = sc.nextLine();
				
				// La envia al servidor
				ConexionSalida.println(lineaPeticion);
				// Si es "Adios" es que finaliza la comunicación
				if (lineaPeticion.equals("Adios") ) {
					break;
				}
				
				// Leo la respuesta de servidor
				lineaRespuesta = conexionEntrada.readLine();
				// No hay respuesta el servidor ha cerrado la conexión
				if ( lineaRespuesta == null ) {
					System.out.println(" El servidor se ha desconectado ");
					break;
				}
				// Muestro por a la salida estándar la respuesta del servidor
				System.out.println("Respuesta servidor: " + lineaRespuesta);
			
			}
		} catch (IOException e) {
			System.out.println("IOException: " + e.getMessage());
		}

		// Libera recursos
		ConexionSalida.close();
		conexionEntrada.close();
		socketCliente.close();
		System.out.println(" Fin del programa cliente");
	}
}