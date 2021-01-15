package com.company;
import javax.swing.*;
import javax.tools.Tool;
import java.awt.*;

public class Main {

    public static void main(String[] args) {
      //  myFrame marco1 = new myFrame();                             //create new frame
      //  marco1.setVisible(true);
      //  marco1.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);      //end program when window closes


        CenteredFrame myFrame = new CenteredFrame();
        myFrame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        myFrame.setVisible(true);


    }
}


class myFrame extends JFrame{
    public myFrame(){
        //setSize(500,300);
        //setLocation(100,100);
        //setResizable(false);                                      // allow/ not allow resize

        setBounds(100, 100, 500, 300);          //position and size

        //setExtendedState(Frame.MAXIMIZED_BOTH);                     //start maximized

        setTitle("MyFrame");                                        //window title

    }
}


class CenteredFrame extends JFrame{
    public CenteredFrame(){

        Toolkit myScreen = Toolkit.getDefaultToolkit();             //This class is the abstract superclass of all actual implementations of the Abstract Window Toolkit.
        Dimension screenSize = myScreen.getScreenSize();            //get screen dimensions
        int screenHeight = screenSize.height;
        int screenWidth = screenSize.width;

        setSize(screenWidth/2, screenHeight/2);
        setLocation(screenWidth/4, screenHeight/4);
        setTitle("MyFrame");                                                     //window title

        Image myIcon = myScreen.getImage("src/images/icon.png");        //icon
        setIconImage(myIcon);

        Lamina lam = new Lamina();
        add(lam);
    }
}

class Lamina extends JPanel{
    public void paintComponent(Graphics g){

        super.paintComponent(g);
        g.drawString("Hello World!",10,40);
        g.drawString("First steps with Swing...",10,80);

    }
}
