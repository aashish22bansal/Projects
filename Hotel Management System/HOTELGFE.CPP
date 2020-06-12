/* CLASS 12 PROJECT: HOTEL MANAGEMENT SYSTEM
   DESIGNED BY: Aashish Bansal            GC No. 17109
		Dangeti Sai Venu Prajuval GC No. 17137
		Abhav Mehrotra            GC No. 17088
 */
#include<iostream.h>
#include<graphics.h>
#include<fstream.h>
#include<iomanip.h>
#include<process.h>
#include<stdlib.h>
#include<string.h>
#include<conio.h>
#include<ctype.h>
#include<stdio.h>
#include<time.h>
#include<dos.h>
//  BEGINNING OF CLASS
class HOTEL
{
  private:
    struct room  // FOR ROOM NUMBER IN THE HOTEL
    {
	int roomno;
	char status;
    }Room;
    struct restaurant  // RESTAURANT IN CUSTOMER MENU
    {
	char name[30];
	int  price;
    }obj[5],obj1[7];
    struct booking     // DETAILS OF THE CUSTOMER WHO WISHES TO BOOK A ROOM
    {
	char bNAME[20];
	char bADDRESS[50];
	char bPHONE[10];
	char bCHECK_IN_DATE[8];
	char ROOMTYPE[15];
	char status;
	int ROOMCHARGE;
	int ROOMNO;
    }BOOK;
  public:
      void roomnoaddition();      //Admin can add rooms to hotel
      int roomcheck(int);         //Checking if the Room is available or not
      void mainmenu();            //Leading to Main Menu of the Program
      void adminmenu();           //Leading to Admin Menu of the Program
      void customermenu();        //Checking if chosen Room is available
      void show_available_rooms();//Showing all available rooms
      void booking();             //Booking a room by user
      void checkin();             //Checking-in the hotel
      void checkout();            //Checking-out of the hotel
      //void R_N_R();               //removing and renaming file
      void cancellation();        //Cancelling the booked room
      void view_datahotel();      //To View the Data stored in the File HOTEL
      void view_databooking();    //To View the Data stored in the File BOOKING.DAT
      void view_datarooms();      //To View the Data stored in the File ROOMS.DAT
      void restaurant();
      void bar();
      void swimming_pool();
      void gymnasium();
}ROOM;
/***************************************************************************
			 END OF CLASS HOTEL
****************************************************************************
  Normal Function R_N_R()

  Feature: The function is used to remove and rename the file "BOOKING.DAT"
	   as the file does not get renamed in the checkout function and it
	   is not possible to use a function in the class and it does not
	   give the required output.
**************************************************************************/
inline int R_N_R()
{
    int ret;
    remove("BOOKING.DAT");
    ret=rename("TEMP.DAT","BOOKING.DAT");
    return ret;
}
/**************************************************************************
			 END OF FUNCTION R_N_R()
**************************************************************************
   MEMBER FUNCTION MAINMENU()

   Main Menu of the Hotel
*****************************************************************************/
void HOTEL::mainmenu()
{
    clrscr();
    short choice;
    gotoxy(1,1);	cout<<"Choose The Operation:";
    gotoxy(3,2);	cout<<"1. Admin Menu.";
    gotoxy(3,3); 	cout<<"2. Customer Menu.";
    gotoxy(3,4);        cout<<"3. Exit.";
    gotoxy(2,5);	cout<<"Enter your choice: ";
    cin>>choice;
    switch(choice)
    {
	case 1: ROOM.adminmenu();
	case 2: ROOM.customermenu();
	case 3: clrscr();
		gotoxy(10,10);   cout<<"You chose to Exit!";
		gotoxy(10,11);   cout<<"Press Enter....";
		gotoxy(10,12);   cout<<"END OF PROJECT.";
		gotoxy(10,13);   cout<<"THANK YOU";
		getch();
		exit(0);
    };// end of switch menu
}
/****************************************************************************
			 END OF MEMBER FUNCTION MAINMENU()
*****************************************************************************
   MEMBER FUNCTION ADMINMENU()

   Admin Menu of the Hotel
*****************************************************************************/
void HOTEL::adminmenu()
{
    clrscr();
    // Varibles declared are used only inside this function
    char admenu='y';
    short choice_ad_menu_menu,choice_booking_menu,choice_checkin_menu;
    short choice_checkout_menu;

    // Displaying the Menu
    while(admenu=='y')
    {
	clrscr();
	cout<<"\nWelcome to the Admin Menu"
	    <<"\n 1. Booking"
	    <<"\n 2. Check-In"
	    <<"\n 3. Check-Out"
	    <<"\n 4. Cancellation"
	    <<"\n 5. View Data"
	    <<"\n 6. Go to Main Menu"
	    <<"\n 7. Add Rooms"
	    <<"\n 8. Show available Rooms"
	    <<"\n 9. Exit"
	    <<"\n\n\t\tEnter your choice: ";
	cin>>choice_ad_menu_menu;
	clrscr();
	// Heading to the Function as per user's choice
	switch(choice_ad_menu_menu)
	{
	    case 1: //BOOKING
		    char bookingmenu='y';
		    clrscr();
		    gotoxy(1,25);
		    cout<<"Booking of Room\n";
		    ROOM.booking();
		    while(bookingmenu=='y')
		    {
			cout<<"\n\t\t\tBOOKING SUCCESSFUL"
			    <<"\n Do you want to proceed to "
			    <<"\n 1. Admin Menu "
			    <<"\n 2. Main Menu \n Enter your choice: ";
			cin>>choice_booking_menu;
			if(choice_booking_menu==1)
			{
			    bookingmenu='n';
			}
			else if(choice_booking_menu==2)
			{
			    bookingmenu='n';
			    ROOM.mainmenu();
			}
			else
			{
			    clrscr();
			    gotoxy(10,25);    cout<<"Wrong Choice!!!";
			    gotoxy(10,26);    cout<<"Press Enter to continue...";
			    gotoxy(10,27);    cout<<"Try Again";
			    getch();
			    clrscr();
			}
		    }
		    break;
	    case 2: // CHECK-IN
		    char checkin='y'; // For Internal Choice of the menu to head to
		    clrscr();
		    gotoxy(1,25);
		    cout<<"Proceeding for Check-in\n";
		    ROOM.checkin();      // Going to the Function
		    cout<<"\n You have just checkedin.";
		    getch();
		    while(checkin=='y')
		    {
			clrscr();
			cout<<"\n Proceed to: \n 1. Main Menu \n 2. Admin "
			    <<" menu \n Enter your choice: ";
			cin>>choice_checkin_menu;
			if(choice_checkin_menu==1)
			    ROOM.mainmenu();
			else if(choice_checkin_menu==2)
			{
			    admenu='y';
			    checkin='n';
			}
			else
			{
			    clrscr();
			    gotoxy(10,25);    cout<<"Wrong Choice!!!";
			    gotoxy(10,26);    cout<<"Press Enter to continue...";
			    gotoxy(10,27);    cout<<"Try Again";
			    getch();
			    clrscr();
			}
		    }
		    break;
	    case 3: // CHECK-OUT
		    clrscr();
		    char checkout='y'; // For Internal choice of which menu to head to
		    cout<<"\n Proceeding to check-out!";
		    ROOM.checkout();   // Going to the Function
		    while(checkout=='y')
		    {
			clrscr();
			cout<<"\n\n\n Check-out Proceedure is over."
			    <<"\n Proceed to: \n 1. Main Menu \n 2."
			    <<" Admin Menu \n 3. Exit \n Enter your choice: ";
			cin>>choice_checkout_menu;
			if(choice_checkout_menu==1)
			     ROOM.mainmenu();
			else if(choice_checkout_menu==2)
			{
			    admenu='y';
			    checkout='n';
			}
			else if(choice_checkout_menu==3)
			{
			    clrscr();
			    gotoxy(10,10);   cout<<"You chose to Exit!";
			    gotoxy(10,11);   cout<<"Press Enter....";
			    gotoxy(10,12);   cout<<"END OF PROJECT.";
			    gotoxy(10,13);   cout<<"THANK YOU";
			    getch();
			    exit(0);
			}
			else
			{
			    clrscr();
			    gotoxy(10,25);    cout<<"Wrong Choice!!!";
			    gotoxy(10,26);    cout<<"Press Enter to continue...";
			    gotoxy(10,27);    cout<<"Try Again";
			    getch();
			    clrscr();
			}
			getch();
		    }// end of while
		    break;
	    case 4: // CANCELLATION
		    clrscr();
		    cout<<"\nProceeding for Cancellation...";
		    ROOM.cancellation(); // Going to the Function
		    char cancellation='y';// For Internal Choice
		    while(cancellation=='y')
		    {
			clrscr();
			cout<<"\n\n\n Cancellation Proceedure is over."
			    <<"\n Proceed to: \n 1. Main Menu \n 2."
			    <<" Admin Menu \n 3. Exit \n Enter your choice:";
			cin>>choice_checkout_menu;
			if(choice_checkout_menu==1)
			{
			    ROOM.mainmenu();
			}
			else if(choice_checkout_menu==2)
			{
			    admenu='y';
			    cancellation='n';
			}
			else if(choice_checkout_menu==3)
			{
			    clrscr();
			    gotoxy(10,10);   cout<<"You chose to Exit!";
			    gotoxy(10,11);   cout<<"Press Enter....";
			    gotoxy(10,12);   cout<<"END OF PROJECT.";
			    gotoxy(10,13);   cout<<"THANK YOU";
			    getch();
			    exit(0);
			}
			else
			{
			    clrscr();
			    gotoxy(10,10);    cout<<"Wrong Choice!!!";
			    gotoxy(10,11);    cout<<"Press Enter to continue...";
			    gotoxy(10,12);    cout<<"Try Again";
			    getch();
			    clrscr();
			}
			getch();
		    }// end of while
		    break;
	    case 5: // VIEW DATA
		    char viewdata='y'; // For choice of Internal Menu
		    while(viewdata=='y') // Displaying Options
		    {
			short choice;
			clrscr();
			gotoxy(15,1);    cout<<"VIEW DATA";
			gotoxy(2,2);     cout<<"1. All records so far";
			gotoxy(2,3);     cout<<"2. All currently occupied rooms";
			gotoxy(2,4);     cout<<"3. Status of all rooms";
			gotoxy(2,5);     cout<<"4. Back to Admin Menu";
			gotoxy(1,6);     cout<<"Enter your choice: ";
			cin>>choice;
			switch(choice)
			{
			    case 1: // Display the information in HOTEL's
				    // main file
				    clrscr();
				    ROOM.view_datahotel();
				    break;
			    case 2: // Display the information in BOOKING file
				    clrscr();
				    ROOM.view_databooking();
				    break;
			    case 3: // Display the information in ROOMS file
				    clrscr();
				    ROOM.view_datarooms();
				    break;
			    case 4: ROOM.adminmenu();
				    break;
			    default:clrscr();
				    gotoxy(10,10);    cout<<"Wrong Choice!!!";
				    gotoxy(10,11);    cout<<"Press Enter to continue...";
				    gotoxy(10,12);    cout<<"Try Again";
				    getch();
			};//end of switch
		    } // end of while
		    break;
	    case 6: clrscr();
		    ROOM.mainmenu();
		    break;
	    case 7: ROOM.roomnoaddition();
		    break;
	    case 8: cout<<"\n Showing all the available rooms!";
		    ROOM.show_available_rooms();
		    break;
	    case 9: // EXIT
		    clrscr();
		    gotoxy(10,10);   cout<<"You chose to Exit!";
		    gotoxy(10,11);   cout<<"Press Enter....";
		    gotoxy(10,12);   cout<<"END OF PROJECT.";
		    gotoxy(10,13);   cout<<"THANK YOU";
		    getch();
		    exit(0);
		    break;
	    default:clrscr();
		    cout<<"\n\n\n\n\t\t\tWrong Choice!!!";
		    cout<<"\n\t\t\tPress Enter to continue...";
		    cout<<"\n\t\t\tTry Again";
		    getch();
	}; // end of switch
    }  // end of while
}
/****************************************************************************
			 END OF MEMBER FUNCTION ADMINMENU()
*****************************************************************************
   MEMBER FUNCTION CUSTOMERMENU()

   Customer Menu of the Hotel
*****************************************************************************/
void HOTEL::customermenu()
{
    // VARIABLES DECLARED ARE USED ONLY INSIDE THIS FUNCTION
    char customerm='y';
    short choice_customer_menu;

    // DISPLAYING THE MENU OPTIONS
    while(customerm=='y')
    {
	clrscr();
	cout<<"Welcome to the Customer Menu:"
	    <<"\n\t1. Restaurant."
	    <<"\n\t2. Bar."
	    <<"\n\t3. Swimming Pool."
	    <<"\n\t4. Gymnasium."
	    <<"\n\t5. Back to Main Menu."
	    <<"\n\t6. Goto Admin Menu."
	    <<"\n\t7. Exit."
	    <<"\n\n\t\tEnter your choice: ";
	cin>>choice_customer_menu;

	// HEADING TO THE FUNTION AS PER USER'S CHOICE
	switch(choice_customer_menu)
	{
	    case 1: cout<<"\n Heading to Restaurant!";
		    getch();
		    ROOM.restaurant();
		    cout<<"\n Heading to Customer Menu! ";
		    customerm='y';
		    break;
	    case 2: cout<<"\n Heading to Bar!";
		    ROOM.bar();
		    getch();
		    customerm='y';
		    break;
	    case 3: cout<<"\n GET READY TO JUMP INTO THE POOL!!!!";
		    getch();
		    ROOM.swimming_pool();
		    customerm='y';
		    break;
	    case 4: cout<<"\n Heading to the Gymnasium!";
		    ROOM.gymnasium();
		    getch();
		    customerm='y';
		    break;
	    case 5: ROOM.mainmenu();
		    break;
	    case 6: ROOM.adminmenu();
		    break;
	    case 7: clrscr();
		    gotoxy(10,10);   cout<<"You chose to Exit!";
		    gotoxy(10,11);   cout<<"Press Enter....";
		    gotoxy(10,12);   cout<<"END OF PROJECT.";
		    gotoxy(10,13);   cout<<"THANK YOU";
		    getch();
		    exit(0);
		    //break;
	    default: clrscr();
		     gotoxy(10,25);    cout<<"Wrong Choice!!!";
		     gotoxy(10,26);    cout<<"Press Enter to continue...";
		     gotoxy(10,27);    cout<<"Try Again";
		     getch();
		     customerm='y';
		     break;
	};// END OF SWITCH
    }
}
/****************************************************************************
		      END OF MEMBER FUNCTION CUSTOMERMENU()
*****************************************************************************
  Member Function roomnoaddition()

  Feature: Admin can ADD Rooms to the Hotel
****************************************************************************/
void HOTEL::roomnoaddition()
{
    fstream fout;  // stream used
    fout.open("ROOMS.DAT",ios::app|ios::binary); // Opening the file
    if(!fout) // checking if stream exists
    {
	cout<<"File could not be opened!!!";
	getch();
	exit(1);
    }
    char TIME='y';

    while(TIME=='y'||TIME=='Y')
    {
	cout<<"\nEnter Room Number: ";
	cin>>Room.roomno;
	cout<<"Enter Status of the Room['e' for empty and 'o' for occupied]: ";
	cin>>Room.status;
	fout.write((char*)&Room,sizeof(Room));
	cout<<"Do you want to ADD more rooms to the Hotel?(y/n): ";
	cin>>TIME;
    }
    fout.close();  // closing the file
}
/****************************************************************************
		   END OF MEMBER FUNCTION roomaddition
*****************************************************************************
  Member Function roomcheck()

  Feature: To CHECK if the room chosen by the user is available or not
*****************************************************************************/
int HOTEL::roomcheck(int rn)
{
    fstream fin;
    int ret=0;   // temporary variable for this Function
    getch();
    fin.open("ROOMS.DAT",ios::in|ios::out|ios::binary);
    if(!fin)  // checking is the stream exists
    {
	cout<<"File could not be opened!!!";
	getch();
	// if the stream does not exist then the FILE is being CREATED here
	cout<<"The Project is running on this system for the first time so the"
	    <<" file 'HOTEL' required for the project does not exit on the "
	    <<"disk. \n Creating the File!!!  \n Press Enter to begin...";
	getch();
	fin.open("ROOMS.DAT",ios::out|ios::binary);
    }
    fin.seekg(0);
    // CHANGING THE STATUS OF THE ROOM
    while(fin.read((char*)&Room,sizeof(Room)))
    {
	if((rn==Room.roomno)&&(Room.status=='e'))
	{
	    cout<<"\nRoom is empty";
	    BOOK.ROOMNO=rn;
	    Room.status='o';
	    cout<<"\nOccupied\t"<<Room.status;
	    long pos=fin.tellp(); // getting the address of the file pointer
	    //BOOK.status='o';// statement is added to check working.
	    fin.seekp(pos-sizeof(Room));// sending the pointer to the
					// required position
	    fin.write((char*)&Room,sizeof(Room));
	    ret=1;   // returning to BOOKING Function and indicates the room
		     // status has been changed successfully
	    break;
	}
	//fin.read((char*)&Room,sizeof(Room));
    }
    return ret;   // GOING back to BOOKING Function
}
/****************************************************************************
	   END OF MEMBER FUNCTION roomassigning()
*****************************************************************************
  Member Function show_available_rooms()

  Feature: Shows the user ALL the AVAILABLE Rooms in the Hotel
****************************************************************************/
void HOTEL::show_available_rooms()
{
    clrscr();
    ifstream check;
    check.open("ROOMS.DAT",ios::in|ios::binary);
    if(!check)
    {
	cout<<"File could not be opened!!!";
	getch();
	// If the stream does not exist then the file is being created here
	cout<<"The Project is running on this system for the first time so the"
	    <<" file 'HOTEL' required for the project does not exit on the "
	    <<"disk. \n Creating the File!!!  \n Press Enter to begin...";
	getch();
	check.open("ROOMS.DAT",ios::out|ios::binary);
	//check.close();
    }
    check.read((char*)&Room,sizeof(Room));
    cout<<"\nAll the Rooms are: \n";
    // Displaying all the rooms
    while(!check.eof())
    {
	cout<<"\n\t Room Number: "<<Room.roomno<<"\t Status: "<<Room.status;
	check.read((char*)&Room,sizeof(Room));
	//check.read((char*)&Room,sizeof(Room));
	getch();
    }
    check.close();
}
/****************************************************************************
	    END OF MEMBER FUNCTION show_available_rooms()
*****************************************************************************
  Member Function booking()

  Feature: User can BOOK a Room in the Hotel
****************************************************************************/
void HOTEL::booking()
{
    clrscr();
    // Declaring streams and opening the required Files
    fstream f1,f2;
    f1.open("HOTEL",ios::app|ios::binary);
    f2.open("BOOKING.DAT",ios::in|ios::app|ios::binary);

    /* CHECKING if the Streams exist and if they don't open the file then the
       file is being created Here
    */
    if(!f1)
    {
	cout<<"File HOTEL could not be opened!!!";
	getch();
	cout<<"The Project is running on this system for the first time so the"
	    <<" file 'HOTEL' required for the project does not exit on the "
	    <<"disk. \n Creating the File!!!  \n Press Enter to begin...";
	getch();
	f1.open("HOTEL",ios::in|ios::out|ios::binary);
    }
    if(!f2)
    {
	cout<<"File BOOKING.DAT could not be opened!!!";
	getch();
	cout<<"The Project is running on this system for the first time so the"
	    <<" file 'HOTEL' required for the project does not exit on the "
	    <<"disk. \n Creating the File!!!  \n Press Enter to begin...";
	getch();
	f2.open("BOOKING.DAT",ios::in|ios::out|ios::binary);
    }

    // Taking input from the Customer of the Required Information for Booking
    cout<<"\n\t\t\tENTER THE REQUIRED DATA\n NAME: ";
    gets(BOOK.bNAME);
    cout<<" ADDRESS: ";
    gets(BOOK.bADDRESS);
    do
    {
	cout<<" PHONE: ";
	gets(BOOK.bPHONE);
    }while(strlen(BOOK.bPHONE)!=10);
    do
    {
	cout<<" CHECK-IN DATE(dd/mm/yyyy): ";
	gets(BOOK.bCHECK_IN_DATE);
    }while(strlen(BOOK.bCHECK_IN_DATE)!=8);
    cout<<endl;
    int roomcode; // temporary variable just for the following part
    cout<<" Select Roomtype\t "
	<<" CODES\tCHARGE PER DAY\n"
	<<" ROYAL SUITE \t1.   \tRs 20,000\n"
	<<" SUPER DELUXE\t2.   \tRs 15,000\n"
	<<" DELUXE      \t3.   \tRs 10,000\n"
	<<" DOUBLE BED  \t4.   \tRs  5,000\n"
	<<" SINGLE BED  \t5.   \tRs  2,000\n";
    char ch='w';
    while(ch=='w')
    {
	cout<<"ROOM CODE: ";
	cin>>roomcode;
	switch(roomcode)
	{
	    case 1 : strcpy(BOOK.ROOMTYPE,"ROYAL SUITE");
		     BOOK.ROOMCHARGE=20000;
		     ch='f';
		     break;
	    case 2 : strcpy(BOOK.ROOMTYPE,"SUPER DELUXE");
		     BOOK.ROOMCHARGE=15000;
		     ch='f';
		     break;
	    case 3 : strcpy(BOOK.ROOMTYPE,"DELUXE");
		     BOOK.ROOMCHARGE=10000;
		     ch='f';
		     break;
	    case 4 : strcpy(BOOK.ROOMTYPE,"DOUBLE BED");
		     BOOK.ROOMCHARGE=5000;
		     ch='f';
		     break;
	    case 5 : strcpy(BOOK.ROOMTYPE,"SINGLE BED");
		     BOOK.ROOMCHARGE=2000;
		     ch='f';
		     break;
	    default: cout<<"ENTER THE RIGHT CODE\n";
	}; // end of switch
    } // END OF WHILE
    ch='w';
    while(ch=='w')
    {
	cout<<"\n Showing all available rooms! \n Press Enter to continue... \n";
	getch();
	show_available_rooms();
	cout<<"\n\n Enter your Room Number: ";
	int rn;
	cin>>rn;
	cout<<"\n Checking if the chosen room is available!";
	if(roomcheck(rn)==1)   // going to the function to check the room
	{
	    BOOK.ROOMNO=rn;    // assigning room number
	    cout<<"\n YOUR ROOMNO IS: "<<BOOK.ROOMNO;
	    f1.write((char*)&BOOK,sizeof(BOOK));  // writing to files
	    f2.write((char*)&BOOK,sizeof(BOOK));
	    ch='f';
	    getch();
	}
	else
	{
	    cout<<"\n Enter an empty room number!!!";
	    getch();
	}
	getch();
    } // END OF WHILE
    f1.close();
    f2.close();
}
/****************************************************************************
		      END OF MEMBER FUNCTION booking()
*****************************************************************************
  Member Function checkin()
*****************************************************************************/
void HOTEL::checkin()
{
    char ans;
    clrscr();
    // Room needs to be Booked before Check-in.
    cout<<"  Have you Booked the room in Advance?(Y/N): ";
    cin>>ans;
    cout<<endl;
    if(ans=='N'||ans=='n')
    {
	cout<<"\n Then you need to book the room first!"
	    <<"\n Press Enter to continue...";
	getch();
	booking();
    }
    // CHECK-IN STARTS
    clrscr();
    int rn;
    cout<<"\n Enter Roomno: ";
    cin>>rn;
    /* Declaring streams, opening files and checking if the streams exist to
       to open the files and if they don't then CREATING the Files Here
    */
    fstream f1;
    fstream room;
    f1.open("BOOKING.DAT",ios::in|ios::app|ios::binary);
    room.open("ROOMS.DAT",ios::in|ios::app|ios::binary);
    if(!f1)
    {
	cout<<"File could not be opened!!! \n Maybe the Project is running on"
	    <<" this system for the first time. \n Creating the File! "
	    <<"\n                 Press Enter to begin....";
	getch();
	f1.open("BOOKING.DAT",ios::in|ios::out|ios::binary);
	cout<<"\n File Created!";
	getch();
	clrscr();
    }
    if(!room)
    {
	cout<<"File could not be opened!!! \n Maybe the Project is running on"
	    <<" this system for the first time. \n Creating the File! "
	    <<"\n                 Press Enter to begin....";
	getch();
	f1.open("ROOMS.DAT",ios::in|ios::out|ios::binary);
	cout<<"\n File Created!";
	getch();
	clrscr();
    }
    f1.read((char*)&BOOK,sizeof(BOOK));
    cout<<"\n Name         : "<<BOOK.bNAME;
    cout<<"\n Address      : "<<BOOK.bADDRESS
	<<"\n Tel. No.     : ";
    for(int i=0;i<10;i++)
	cout<<BOOK.bPHONE[i];
    cout<<"\n Check-in Date: ";
    for(i=0;i<8;i++)
	cout<<BOOK.bCHECK_IN_DATE[i];
    cout<<"\n Room Type    : ";
    for(i=0;i<strlen(BOOK.ROOMTYPE);i++)
	cout<<BOOK.ROOMTYPE[i];
    gotoxy(10,25);	cout<<"Press Enter To Continue...";
    getch();
    f1.close();
    clrscr();
}
/****************************************************************************
		      END OF MEMBER FUNCTION checkin()
*****************************************************************************
  Member Function checkout()
*****************************************************************************/
void HOTEL::checkout()
{
    clrscr();
    int rn;
    char od[8],ot[4],ch='w';          // w refers to working
    // Loops to Enter Check-out Date And Time in Correct Length.
    while(ch=='w')
    {
	cout<<"\n Enter the Check-out Date [Format: dd/mm/yyyy NO Spaces Required]: ";
	gets(od);
	if(strlen(od)!=8)
	{
	    cout<<"\nPlease Enter a Valid Check-out Date! ";
	}
	else
	{
	    ch='f';       // f refers to fail
	}
    }
    cout<<"\nod:"<<od;
    ch='w';
    while(ch=='w')
    {
	cout<<"\nod:"<<od;
	cout<<"\n Enter the Check-out Time [Format: hh:mm]: ";
	gets(ot);
	if(strlen(ot)!=4)
	{
	    cout<<"\nPlease Enter a Valid Check-out Time! ";
	}
	else
	{
	    ch='f';
	}
    }
    cout<<"\nod:"<<od;
    cout<<"\n Enter Room Number: ";
    cin>>rn;
    clrscr();

    // declaring streams for files
    fstream book;
    fstream temp;
    fstream room;

    // opening files
    book.open("BOOKING.DAT",ios::in|ios::out|ios::binary);
    temp.open("TEMP.DAT",ios::in|ios::out|ios::binary);
    room.open("ROOMS.DAT",ios::in|ios::out|ios::binary);

    // checking working of streams for files
    if(!temp)
    {
	cout<<"\n TEMP File cannot be opened!!!\nABORTING!!!";
	getch();
	exit(1);
    }
    if(!room)
    {
	cout<<"\n ROOM File cannot be opened!!!\nABORTING!!!";
	getch();
	exit(1);
    }
    if(!book)
    {
	cout<<"\n BOOKING 1 File cannot be opened!!!\nABORTING!!!";
	getch();
	cout<<"File could not be opened!!! \n Maybe the Project is running on"
	    <<" this system for the first time. \n Creating the File! "
	    <<"\n                 Press Enter to begin....";
	getch();
	// CREATING THE FILE DUE TO ABOVE REASON
	fstream f1;
	f1.open("BOOKING.DAT",ios::in|ios::app|ios::binary);
	cout<<"\n File Created!";
	f1.close();
	getch();
	clrscr();
	//exit(1);
    }

    // reading files
    room.read((char *)&Room,sizeof(Room));
    book.read((char *)&BOOK,sizeof(BOOK));

    char milgai='n';
    // temporary variable used till the time of displaying the record
    cout<<"\nod:"<<od;
    do
    {
	//book.read((char *)&BOOK,sizeof(BOOK));
	if(BOOK.ROOMNO==rn)
	{
	    milgai='y';
	    // displaying details
	    clrscr();
	    gotoxy(25,2);
	    cout<<"------------SUMMARY------------\n"
		<<"\n\t Room Number    : "<<BOOK.ROOMNO
		<<"\n\t Name           : "<<BOOK.bNAME
		<<"\n\t Address        : "<<BOOK.bADDRESS
		<<"\n\t Tel. No.       : ";
	    for(int i=0;i<10;i++)
		cout<<BOOK.bPHONE[i];
	    cout<<"\n\t Room Type      : ";
	    for(i=0;i<strlen(BOOK.ROOMTYPE);i++)
		cout<<BOOK.ROOMTYPE[i];
	    cout<<"\n\t Check-in Date  : ";
	    for(i=0;i<8;i++)
		cout<<BOOK.bCHECK_IN_DATE[i];
	    cout<<"\n\t Check-out Date : ";
	    //for(i=0;i<8;i++)
		cout<<od;
	    cout<<"\n\t Check-out Time : "<<ot;
	    getch();
	    //break;
	} // end of if for displaying details
    }while( (BOOK.ROOMNO!=rn) && (!book.eof()) && (milgai=='n') );
    clrscr();
    book.close();
    room.close();
    // time to remove the record of the customer and change the status of the
    // room
    clrscr();
    // time to remove record from BOOKING.DAT
    char choice='y',found='f';
    // opening files
    //fstream room;
    room.open("ROOMS.DAT",ios::in|ios::out|ios::binary);
    ifstream fin("BOOKING.DAT",ios::in|ios::binary);
    ofstream fout("TEMP.DAT",ios::out|ios::binary);
    // positioning file pointers
    fin.seekg(0);
    fout.seekp(0);
    fin.read((char*)&BOOK,sizeof(BOOK));  // reading before proccessing
    cout<<"\nod:"<<od;
    do
    {
	if((BOOK.ROOMNO==rn)&&(found=='f'))
	{
	    found='y';
	    cout<<"\n Has the customer left the Hotel?(Y/N): ";
	    cin>>choice;
	    if(choice=='n'||choice=='N')
		fout.write((char*)&BOOK,sizeof(BOOK));
	    else
	    {
		cout<<"\n Record will be removed after the Customer leaves the"
		    <<" leaves the Hotel!";
		getch();
	    }
	}
	fout.write((char*)&BOOK,sizeof(BOOK));
	fin.read((char*)&BOOK,sizeof(BOOK));      //reading after processing
    }while(!fin.eof());
    // end of do-while for writing to the file
    if(found=='f')
    {
	clrscr();
	cout<<"\n\n\n\n\t\t\t\t Room could not be found!";
	getch();
    }
    fin.close();
    fout.close();
    getch();
    /*
    // removing the file after copying the requires data
    remove("BOOKING.DAT");
    // renaming file after the required data is copied
    int ret;
    ret=rename("TEMP.DAT","BOOKING.DAT");
    cout<<"\n ret="<<ret;
    */

    //time to change the status of the room to empty
    room.seekg(0);
    cout<<"\nod:"<<od;
    do
    {
	if((rn==Room.roomno)&&(Room.status=='o'))
	{
	    cout<<"\n Room is Emptied!\n Changing Status of the Room...";
	    Room.status='e';
	    cout<<"\n Room Status: "<<Room.status;
	    long pos=room.tellp();
	    room.seekp(pos-sizeof(Room));
	    room.write((char*)&Room,sizeof(Room));
	}
	room.read((char*)&Room,sizeof(Room));
    }while(room.read((char*)&Room,sizeof(Room))/*!room.eof()*/);
    room.close();
    // Using a normal function to rename the file.
    int ret;
    ret=R_N_R();
    if(ret)
    {
	cout<<"\n Files copied and room status changed!"
	    <<"\n\n\n\t\t\t Checkout Procedure is over!"
	    <<"\n\n\n\t\t\t Please Visit Again!";
	getch();
    }
    else
    {
	cout<<"\n PLAN DIDN'T WORK";
	getch();
    }

    /*
    remove("BOOKING.DAT");
    rename("TEMP.DAT","BOOKING.DAT");
    */
    clrscr();
}
/**************************************************************************
			 END OF FUNCTION CHECK_OUT
***************************************************************************/
/**************************************************************************
  Member Function Cancellation()
***************************************************************************/
void HOTEL::cancellation()
{
    clrscr();
    int rn;
    char choice='y',found='f';
    cout<<"\n Enter Room no. : ";
    cin>>rn;
    /* Declaring streams, opening files and checking if the streams exist to
       to open the files.
    */
    ifstream fin;
    fin.open("BOOKING.DAT",ios::in|ios::binary);
    ofstream fout;
    fout.open("TEMP.DAT",ios::out|ios::binary);
    fstream room;
    room.open("ROOMS.DAT",ios::in|ios::binary);
    // checking working of streams for files
    if(!fout)
    {
	cout<<"\n TEMP File cannot be opened!!!\nABORTING!!!";
	getch();
	exit(1);
    }
    if(!room)
    {
	cout<<"\n ROOM File cannot be opened!!!\nABORTING!!!";
	getch();
	exit(1);
    }
    if(!fin)
    {
	cout<<"\n BOOKING 1 File cannot be opened!!!\nABORTING!!!";
	getch();
	exit(1);
    }
    fin.read((char*)&BOOK,sizeof(BOOK));  // reading before proccessing

    // time to remove record from BOOKING.DAT
    do
    {
	if((BOOK.ROOMNO==rn)&&(found=='f'))
	{
	    found='y';
	    cout<<"\n Has the customer left the Hotel?(Y/N): ";
	    cin>>choice;
	    if(choice=='n'||choice=='N')
		fout.write((char*)&BOOK,sizeof(BOOK));
	    else
	    {
		cout<<"\n Record will be removed after the Customer leaves the"
		    <<" leaves the Hotel!";
		getch();
	    }
	}
	else
	{
	    fout.write((char*)&BOOK,sizeof(BOOK));
	}
	fin.read((char*)&BOOK,sizeof(BOOK));      //reading after processing
    }while(!fin.eof());
    // end of do-while for writing to the file
    if(found=='f')
    {
	clrscr();
	cout<<"\n\n\n\n\t\t\t\t Room could not be found!";
	getch();
    }
    fin.close();
    fout.close();
    remove("BOOKING.DAT");
    rename("TEMP.DAT","BOOKING.DAT");

    //time to change the status of the room to empty
    room.seekg(0);
    do
    {
	if((rn==Room.roomno)&&(Room.status=='o'))
	{
	    cout<<"\n Room is Emptied!\n Changing Status of the Room...";
	    Room.status='e';
	    cout<<"\n Room Status: "<<Room.status;
	    long pos=room.tellp();
	    room.seekp(pos-sizeof(Room));
	    room.write((char*)&Room,sizeof(Room));
	}
	room.read((char*)&Room,sizeof(Room));
    }while(room.read((char*)&Room,sizeof(Room))/*!room.eof()*/);
    room.close();
    room.close();
    cout<<"\n Files copied and room status changed!"
	<<"\n\n\n\t\t\t Procedure is over!"
	<<"\n\n\n\t\t\t Please Visit Again!";
    getch();
    clrscr();
}
/**************************************************************************
			 END OF FUNCTION CANCELLATION
***************************************************************************
  Member Function View Data

  Feature: Admin can VIEW the Data Stored in the File "HOTEL"
***************************************************************************/
void HOTEL::view_datahotel()
{
    clrscr();
    /* Declaring streams, opening files and checking if the streams exist to
       to open the files and if they don't then CREATING the Files Here
    */
    ifstream MAINFILE;
    MAINFILE.open("HOTEL",ios::in|ios::binary);
    if(!MAINFILE)
    {
	clrscr();
	cout<<"\n\n\n\n\t\t\tCould not open file!"
	    <<"\n\tPress Enter..."
	    <<"\n\tAborting!!!";
	getch();
	exit(1);
     }
     clrscr();
     // repositioning the file pointer to the begginning of the file
     MAINFILE.seekg(0);
     // Processing
     MAINFILE.read((char*)&BOOK,sizeof(BOOK));
     do
     {
	 cout<<"Room Number   :"<<BOOK.ROOMNO;
	 cout<<"\n Name         : "<<BOOK.bNAME;
	 cout<<"\n Address      : "<<BOOK.bADDRESS
	     <<"\n Tel. No.     : ";
	 for(int i=0;i<10;i++)
	     cout<<BOOK.bPHONE[i];
	 cout<<"\n Check-in Date: ";
	 for(i=0;i<8;i++)
	     cout<<BOOK.bCHECK_IN_DATE[i];
	 cout<<"\n Room Type    : ";
	 for(i=0;i<strlen(BOOK.ROOMTYPE);i++)
	     cout<<BOOK.ROOMTYPE[i];
	 cout<<endl<<endl;
	 getch();
	 MAINFILE.read((char*)&BOOK,sizeof(BOOK));
     }while(!MAINFILE.eof());
     if(MAINFILE.eof())
     {
	 clrscr();
	 cout<<"\n Reading of file is over."
	     <<"\n\n All Records Stored in File were Displayed."
	     <<"\n\n Heading Back to Options.";
	 getch();
     }
     MAINFILE.close();
}
/**************************************************************************
			 END OF MEMBER FUNCTION VIEW DATAHOTEL
***************************************************************************
  Member Function View Databooking

  Feature: Admin Can VIEW the Data Stored in the File "BOOKING.DAT" and see
	   the Personal Data Entered by the Customer while Booking the Room.
***************************************************************************/
void HOTEL::view_databooking()
{
    clrscr();
    short int flag=0;
    /* Declaring streams, opening files and checking if the streams exist to
       to open the files and if they don't then CREATING the Files Here
    */
    ifstream MAINFILE;
    MAINFILE.open("BOOKING.DAT",ios::in|ios::binary);
    if(!MAINFILE)
    {
	clrscr();
	cout<<"\n\n\n\n\t\t\t Could not open file!"
	    <<"\n\t Press Enter..."
	    <<"\n\t Aborting!!!";
	getch();
	exit(1);
    }
    clrscr();
    // repostioning file pointer to the begginning of the file
    MAINFILE.seekg(0);
    MAINFILE.read((char*)&BOOK,sizeof(BOOK));
    do
     {
	 cout<<"Room Number   :"<<BOOK.ROOMNO;
	 cout<<"\n Name         : "<<BOOK.bNAME;
	 cout<<"\n Address      : "<<BOOK.bADDRESS
	     <<"\n Tel. No.     : ";
	 for(int i=0;i<10;i++)
	     cout<<BOOK.bPHONE[i];
	 cout<<"\n Check-in Date: ";
	 for(i=0;i<8;i++)
	     cout<<BOOK.bCHECK_IN_DATE[i];
	 cout<<"\n Room Type    : ";
	 for(i=0;i<strlen(BOOK.ROOMTYPE);i++)
	     cout<<BOOK.ROOMTYPE[i];
	 cout<<endl<<endl;
	 getch();
	 MAINFILE.read((char*)&BOOK,sizeof(BOOK));
     }while(!MAINFILE.eof());
    if( (flag==0) && (MAINFILE.eof()) )
    {
	cout<<"No records exist!";
    }
    if(MAINFILE.eof())
    {
	 clrscr();
	 cout<<"\n Reading of file is over."
	     <<"\n\n All Records Stored in File were Displayed."
	     <<"\n\n Heading Back to Options.";
	 getch();
    }
    MAINFILE.close();
}
/**************************************************************************
			 END OF MEMBER FUNCTION VIEW DATABOOKING
***************************************************************************
  Member Function View Datarooms

  Feature: Admin can VIEW the Data Stored in the File "ROOMS.DAT" and check
	   the status of the Rooms in the Hotel and Find out which Rooms are
	   currently occupied by the Customer and which Rooms are Empty and
	   available for Booking.
***************************************************************************/
void HOTEL::view_datarooms()
{
    clrscr();
    /* Declaring streams, opening files and checking if the streams exist to
       to open the files and if they don't then CREATING the Files Here
    */
    ifstream MAINFILE;
    short int flag=0;
    MAINFILE.open("ROOMS.DAT",ios::in|ios::binary);
    if(!MAINFILE)
    {
	clrscr();
	gotoxy(25,25);    cout<<"Could not open file!";
	gotoxy(25,26);    cout<<"Press Enter...";
	gotoxy(25,27);    cout<<"Aborting!!!";
	getch();
	exit(1);
     }
     clrscr();
     gotoxy(5,2);    cout<<"Displaying all the Rooms in the Hotel";
     MAINFILE.read((char*)&Room,sizeof(Room));
     while(!MAINFILE.eof())
     {
	 cout<<"\n Room Number: "<<Room.roomno<<"\t Status: "<<Room.status;
	 MAINFILE.read((char*)&Room,sizeof(Room));
	 flag=1;
	 getch();
     }
     if(flag==0)
     {
	 cout<<"No records exist";
	 getch();
     }
     if(MAINFILE.eof())
     {
	 clrscr();
	 cout<<"\n Reading of file is over."
	     <<"\n\n All Records Stored in File were Displayed."
	     <<"\n\n Heading Back to Options.";
	 getch();
     }
     MAINFILE.close();
}
/***************************************************************************
	      END OF MEMBER FUNCTION VIEW DATAROOMS
****************************************************************************
  MEMBER FUNCTION void restaurant();
***************************************************************************/
void HOTEL::restaurant()
{
    clrscr();
    // DECLARED VARIABLES are used only inside this Function
    int sno=0,qty=0,cost=0;
    char ch='y';
    // Dishes with their Prices
    strcpy(obj[0].name,"Chicken Tikka");  obj[0].price=180;
    strcpy(obj[1].name,"Chicken Kabab");  obj[1].price=170;
    strcpy(obj[2].name,"Mast Biryani ");  obj[2].price=250;
    strcpy(obj[3].name,"Butter Naan  ");  obj[3].price=160;
    strcpy(obj[4].name,"Gulab Jamun  ");  obj[4].price=100;
    cout<<"\n\t\t\tWelcome to the restaurant!!!\n Displaying the Menu:\n";
    for(int i=0;i<5;i++)
    {
	cout<<"\t"<<i+1<<"\t"<<obj[i].name<<"\t Rs. "<<obj[i].price<<endl;
    }
    while(ch=='y'||ch=='Y')
    {
	cout<<"\nWhat would you like to order [Enter Serial no.]: ";
	cin>>sno;
	cout<<"Enter the Quantity: ";
	cin>>qty;
	cost=(obj[sno-1].price*qty)+cost;
	cout<<"Would you like to order more items?(y/n): ";
	cin>>ch;
    }
    cout<<"Your Food will be Served Soon....\n\n";
    cout<<"The Amount is: Rs. "<<cost;
    getch();
}
/**************************************************************************
			 END OF FUNCTION RESTAURANT
***************************************************************************
  MEMBER FUNCTION void bar();
***************************************************************************/
void HOTEL::bar()
{
    clrscr();
    //static int cost=0;
    int sno=0,qty=0,cost=0;
    char ch='y';
    // Available Drinks with their Prices
    strcpy(obj1[0].name,"Scotch ");     obj1[0].price=180;
    strcpy(obj1[1].name,"Rum    ");     obj1[1].price=170;
    strcpy(obj1[2].name,"Whiskey");     obj1[2].price=250;
    strcpy(obj1[3].name,"Beer   ");     obj1[3].price=160;
    strcpy(obj1[4].name,"Gin    ");     obj1[4].price=300;
    strcpy(obj1[5].name,"Brandy ");     obj1[5].price=275;
    strcpy(obj1[6].name,"Vodka  ");     obj1[6].price=350;
    strcpy(obj1[7].name,"Tequila");     obj1[7].price=180;
    cout<<"\n\t\t\tWelcome to the bar !!!\n Displaying the Menu:\n";
    for(int i=0;i<8;i++)
    {
	cout<<i+1<<"\t"<<obj1[i].name<<"\tRs. "<<obj1[i].price<<endl;
    }
    while(ch=='y'||ch=='Y')
    {
	cout<<"\nWhat would you like to order [Enter Serial no]: ";
	cin>>sno;
	cout<<"Enter the Quantity: ";
	cin>>qty;
	cost=(obj1[sno-1].price*qty)+cost;
	cout<<"Would you like to order more items?(y/n): ";
	cin>>ch;
    }
    cout<<"Your Drink will be Served Soon....\n\n";
    cout<<"The Amount is: Rs. "<<cost;
    getch();
}
/**************************************************************************
			 END OF FUNCTION BAR
***************************************************************************
  MEMBER FUNCTION void swimming_pool();
***************************************************************************/
void HOTEL::swimming_pool()
{
    clrscr();
    gotoxy(5,3);  cout<<"RULES OF THE SWIMMING POOL";
    gotoxy(6,4);  cout<<"1. No glass tumbler.";
    gotoxy(6,5);  cout<<"2. No drinks or food.";
    gotoxy(6,6);  cout<<"3. No animal allowed in the pool.";
    gotoxy(6,7);  cout<<"4. No running or diving near the pool.";
    gotoxy(6,8);  cout<<"5. Only swimming costumes are allowed.";
    gotoxy(6,9);  cout<<"6. No urinating in the pool.";
    gotoxy(6,10); cout<<"7. Pool Timings: 7:00 AM to 7:00 PM";
    gotoxy(6,11); cout<<"CAUTION: Swim at your own risk.";
    getch();
}
/**************************************************************************
			 END OF FUNCTION SWIMMING POOL
***************************************************************************
  MEMBER FUNCTION void GYMNASIUM();
***************************************************************************/
void HOTEL::gymnasium()
{
    clrscr();
    gotoxy(5,4);  cout<<"RULES OF THE GYMNASIUM";
    gotoxy(6,5);  cout<<"1. Food, Gum, Beverages and glass items are prohibited.";
    gotoxy(6,6);  cout<<"2. Proper pro-athletic footwear allowed.";
    gotoxy(6,7);  cout<<"3. Scheduled events have priority in gym.";
    gotoxy(6,8);  cout<<"4. Return all equipment are use and sign in the register.";
    gotoxy(6,9);  cout<<"5. No Damage must be caused to any equipment.";
    getch();
}
/**************************************************************************
			 END OF FUNCTION GYMNASIUM
**************************************************************************

**************************************************************************/
/*inline void R_N_R()
{
    remove("BOOKING.DAT");
    rename("TEMP.DAT","BOOKING.DAT");
}
/**************************************************************************
 The execution of the program begins here.
***************************************************************************/

int main()
{
    clrscr();
    textbackground(BLUE);
    cout<<"\t\t\t Welcome to the Project \n";
    cout<<"\t\t\t HOTEL MANAGEMENT SYSTEM \n";
    cout<<"By:";
    cout<<"\tAashish Bansal            G.C. No. 17109 \n";
    cout<<"\tDangeti Sai Venu Prajuval G.C. No. 17137 \n";
    cout<<"\tAbhav Mehrotra            G.C. No. 17088 \n";
    cout<<"\n\n\n\tPress Enter to start...\n";
    getch();
    /*
    // Sometimes Required
    // Creating BOOKING.DAT
    fstream in;
    in.open("BOOKING.DAT",ios::in|ios::out|ios::binary);
    in.close();
    //*/
    ROOM.mainmenu();
    getch();
    clrscr();
    cout<<"\n\n\n\n\n\n\t\t\t\t END OF PROJECT \n";
    cout<<"\t\t\t\t   THANK YOU  ";
    getch();
    return 0;
}
/****************************************************************************
		   END OF MAIN()
*****************************************************************************
		   END OF PROJECT
*****************************************************************************/