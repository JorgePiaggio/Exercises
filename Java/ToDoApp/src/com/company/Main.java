package com.company;

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class Main {

    public static void main(String[] args) {

        ArrayList<String> ToDo = new ArrayList<String>();
        ArrayList<String> DoneNotDone = new ArrayList<String>();
        char next='y';

        while(next == 'y'){
            System.out.println("Enter a task to add to the list: \n");
            Scanner scanner = new Scanner(System.in);
            String task = scanner.nextLine();
            ToDo.add(task);

            System.out.println("Do you want to add another task? y/n \n");
            next = scanner.next().charAt(0);

        }

        System.out.println(ToDo.size());


        for(int i = 0; i < ToDo.size(); i++) {
            DoneNotDone.add("[ ] - ");
        }

        printList(ToDo, DoneNotDone);

        int menu = 1;
        while(menu != 0) {

            System.out.println("Enter a task number to check/uncheck it - Enter 0 to exit\n");
            Scanner scanner2 = new Scanner(System.in);

            menu = scanner2.nextInt();

            if(menu != 0){
                String aux = "[X] - ";
                if(DoneNotDone.get(menu-1).equals("[X] - ")){
                    aux = "[ ] - ";
                }
                DoneNotDone.set(menu-1, aux);
            }
            printList(ToDo, DoneNotDone);

        }

    }

    public static void printList(ArrayList<String> list, ArrayList<String> done){
        System.out.println("TO-DO LIST");
        System.out.println("**********\n");

        for(int i = 0; i < list.size(); i++) {
            System.out.print("\nTASK " + i + " - " + done.get(i));
            System.out.print(list.get(i));
        }
        System.out.println("\n**********\n");
    }


}
