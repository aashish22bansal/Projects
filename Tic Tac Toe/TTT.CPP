/*************************************************************************************************************************
	                                                SOURCE CODE
**************************************************************************************************************************/
#include <iostream.h>
#include <string.h>
#include <conio.h>
#include <time.h>
#include <stdio.h>
#include <stdlib.h>

//Declarations.

char square[10] = {'o','1','2','3','4','5','6','7','8','9'};
int checkwin();
void board();

int checkwin(char[]);
void board(char[]);

//Artificial Intelegence Start.
int computerRandomPick; //random location which computer selects if first.
int computerPick; //used to decide computer vs player AI moves.

//player interaction
int playerChoice;
int playerTurn;
int gameWin = 3;

//gameWin is integer because it will allow program to explicitly say who wins instead of bool which will allow you to only declare game state.

//board arrays
char blockOne = '1';
char blockTwo = '2';
char blockThree = '3';
char blockFour = '4';
char blockFive = '5';
char blockSix = '6';
char blockSeven = '7';
char blockEight = '8';
char blockNine = '9';
//random starting turn chooser
int turnFirst; //variable to decide whoever goes first

/*****************************************************************************
  FUNCTION CHECKS THE STATUS OF THE COMPUTER WINNING.
******************************************************************************/
int checkWinComputer()
{
    if((blockOne == 'O' && blockFive == 'O' && blockNine == 'O' && playerTurn == '0')//diagonal, 1 - 5 = 9
       ||(blockThree == 'O' && blockFive == 'O' && blockSeven == 'O' && playerTurn == '0')
       ||(blockOne == 'O' && blockTwo == 'O' && blockThree == 'O' && playerTurn == '0') //horizontal 1 - 2 = 3
       ||(blockFour == 'O' && blockFive == 'O' && blockSix == 'O' && playerTurn == '0') //horizontal 4 - 5 = 6
       ||(blockSeven == 'O' && blockEight == 'O' && blockNine == 'O' && playerTurn == '0') //horizontal 7 - 8 = 9
       ||(blockOne == 'O' && blockFour == 'O' && blockSeven == 'O' && playerTurn == '0') //vertical 1 - 4 = 7
       ||(blockTwo == 'O' && blockFive == 'O' && blockEight == 'O' && playerTurn == '0') //vertical 2 - 5 = 8
       ||(blockThree == 'O' && blockSix == 'O' && blockNine == 'O' && playerTurn == '0')
      )
	gameWin = 2; //This will make computer win.
    return gameWin;
}
//Artificial Intelegence End.
/*****************************************************************************
   FUNCTION TO CHECK THE WINNING STATUS OF THE PLAYER.
******************************************************************************/
int checkWinPlayer()
{
    if((blockOne == 'X' && blockFive == 'X' && blockNine == 'X' && playerTurn == '1') //diagonal, 1 - 5 - 9
       ||(blockThree == 'X' && blockFive == 'X' && blockSeven == 'X' && playerTurn == '1') //diagonal, 3 - 5 - 7
       ||(blockOne == 'X' && blockTwo == 'X' && blockThree == 'X' && playerTurn == '1') //horizontal 1 - 2 - 3
       ||(blockFour == 'X' && blockFive == 'X' && blockSix == 'X' && playerTurn == '1') //horizontal 4 - 5 - 6
       ||(blockSeven == 'X' && blockEight == 'X' && blockNine == 'X' && playerTurn == '1') //horizontal 7 - 8 - 9
       ||(blockOne == 'X' && blockFour == 'X' && blockSeven == 'X' && playerTurn == '1') //vertical 1 - 4 - 7
       ||(blockTwo == 'X' && blockFive == 'X' && blockEight == 'X' && playerTurn == '1') //vertical 2 - 5 - 8
       ||(blockThree == 'X' && blockSix == 'X' && blockNine == 'X' && playerTurn == '1') //vertical 3 - 6 - 9
      )	
        gameWin = 1; //This will make player win.
    return gameWin;
}
/*****************************************************************************
 MAIN PART FUNCTION OF THE COMPUTER AI STARTS HERE.
******************************************************************************/
int computerAI() //work on computerAI part where the computer tries to win before countering.
{
    playerTurn = '0';

    if(blockOne == 'O' && blockTwo == 'O' && blockThree == '3'
       && playerTurn == '0') //1 - 2 = 3 win
    {
	blockThree = 'O';
	playerTurn = '1';
    }

    else if(blockFour == 'O' && blockFive == 'O' && blockSix == '6'
       && playerTurn == '0' ) //4 - 5 = 6 win
    {
	blockSix = 'O';
	playerTurn = '1';
    }

    else if(blockSeven == 'O' && blockEight == 'O' && blockNine == '9'
       && playerTurn == '0' ) //7 - 8 = 9 win
    {
	blockNine = 'O';
	playerTurn = '1';
    }

    else if(blockOne == 'O' && blockFour == 'O' && blockSeven == '7'
       && playerTurn == '0' ) //1 - 4 = 7 win
    {
	blockSeven = 'O';
	playerTurn = '1';
    }

    else if(blockTwo == 'O' && blockFive == 'O' && blockEight == '8'
       && playerTurn == '0' ) //2 - 5 = 8 win
    {
	blockEight = 'O';
	playerTurn = '1';
    }


    else if(blockThree == 'O' && blockSix == 'O' && blockNine == '9'
       && playerTurn == '0' ) //3 - 6 = 9 win
    {
	blockNine = 'O';
	playerTurn = '1';
    }

    else if(blockOne == 'O' && blockFive == 'O' && blockNine == '9'
       && playerTurn == '0') //1 - 5 = 9 win
    {
	blockNine = 'O';
	playerTurn = '1';
    }

    else if(blockThree == 'O' && blockFive == 'O' && blockSeven == '7'
       && playerTurn == '0') //3 - 5 = 7 win
    {
	blockSeven = 'O';
	playerTurn = '1';
    }

    else if((playerChoice == 1 || playerChoice == 5 || playerChoice == 9)
       && playerTurn == '0')
    {
	if((blockOne == 'X' && blockFive == 'X') && playerTurn == '0'
	   && blockNine == '9') //1 - 5 = 9 diagonal
	{
	    blockNine = 'O';
	    playerTurn = '1';
	}

	else if((blockOne == 'X' && blockNine == 'X') && playerTurn == '0'
	   && blockFive == '5') //1 - 9 = 5 diagonal
	{
	    blockFive = 'O';
	    playerTurn = '1';
	}

	else if((blockFive == 'X' && blockNine == 'X') && playerTurn == '0'
	   && blockOne == '1') //5 - 9 = 1 diagonal
	{
	    blockOne = 'O';
	    playerTurn = '1';
	}
    }

    else if((playerChoice == 3 || playerChoice == 5 || playerChoice == 7)
       && playerTurn == '0')
    {
	else if((blockSeven == 'X' && blockFive == 'X') && playerTurn == '0'
	   && blockThree == '3') //7 - 5 = 3 diagonal
	{
	    blockThree = 'O';
	    playerTurn = '1';
	}

	else if((blockSeven == 'X' && blockThree == 'X') && playerTurn == '0'
	   && blockFive == '5') //7 - 3 = 5 diagonal
	{
	    blockFive = 'O';
	    playerTurn = '1';
	}

	else if((blockFive == 'X' && blockThree == 'X') && playerTurn == '0'
	   && blockSeven == '7') //5 - 3 = 7 diagonal
	{
	    blockSeven = 'O';
	    playerTurn = '1';
	}
    }

    else if((playerChoice == 1 || playerChoice == 2 || playerChoice == 3)
       && playerTurn == '0')
    {
	if((blockOne == 'X' && blockTwo == 'X') && playerTurn == '0'
	   && blockThree == '3') // 1 - 2 = 3 horizontal
	{
	    blockThree = 'O';
	    playerTurn = '1';
	}

	else if((blockOne == 'X' && blockThree == 'X') && playerTurn == '0'
	   && blockTwo == '2') //1 - 3 = 2 horizontal
	{
	    blockTwo = 'O';
	    playerTurn = '1';
	}

	else if((blockTwo == 'X' && blockThree == 'X') && playerTurn == '0'
	   && blockOne == '1') //2 - 3 = 1 horizontal
	{
	    blockOne = 'O';
	    playerTurn = '1';
	}
    }

    else if((playerChoice == 4 || playerChoice == 5 || playerChoice == 6)
       && playerTurn == '0')
    {
	if((blockFour == 'X' && blockFive == 'X') && playerTurn == '0'
	   && blockSix == '6') //4 - 5 = 6 horizontal line 2
	{
	    blockSix = 'O';
	    playerTurn = '1';
	}

	else if((blockFour == 'X' && blockSix == 'X') && playerTurn == '0'
	   && blockFive == '5') //4 - 6  = 5 horizontal line 2
	{
	    blockFive = 'O';
	    playerTurn = '1';
	}

	else if((blockFive == 'X' && blockSix == 'X') && playerTurn == '0'
	   && blockFour == '4') //5 - 6 = 4 horizontal line 2
	{
	    blockFour = 'O';
	    playerTurn = '1';
	}
    }

    else if((playerChoice == 7 || playerChoice == 8 || playerChoice == 9)
       && playerTurn == '0')
    {
	if((blockSeven == 'X' && blockEight == 'X') && playerTurn == '0'
	   && blockNine == '9') //7 - 8 = 9 horizontal line 3
	{
	    blockNine = 'O';
	    playerTurn = '1';
	}

	else if((blockSeven == 'X' && blockNine == 'X') && playerTurn == '0'
	   && blockEight == '8') //7 - 9 = 8 horizontal line 3
	{
	    blockEight = 'O';
	    playerTurn = '1';
	}

	else if((blockEight == 'X' && blockNine == 'X') && playerTurn == '0'
	   && blockSeven == '7') //8 - 9 = 7 horizontal line 3
	{
	    blockSeven = 'O';
	    playerTurn = '1';
	}
    }

    else if((playerChoice == 1 || playerChoice == 4 || playerChoice == 7)
       && playerTurn == '0')
    {
	if((blockOne == 'X' && blockFour == 'X') && playerTurn == '0'
	   && blockSeven == '7') //1 - 4 = 7 vertical row 1
	{
	    blockSeven = 'O';
	    playerTurn = '1';
	}

	else if((blockOne == 'X' && blockSeven == 'X') && playerTurn == '0'
	   && blockFour == '4') //1 - 7 = 4 vertical row 1
	{
	    blockFour = 'O';
	    playerTurn = '1';
	}

	else if((blockFour == 'X' && blockSeven == 'X') && playerTurn == '0'
	   && blockOne == '1') //4 - 7 = 1 vertical row 1
	{
	    blockOne = 'O';
	    playerTurn = '1';
	}

    }

    else if((playerChoice == 2 || playerChoice == 5 || playerChoice == 8)
       && playerTurn == '0')
    {
	if((blockTwo == 'X' && blockFive == 'X') && playerTurn == '0'
	   && blockEight == '8') //2 - 5 = 8 vertical row 2
	{
	    blockEight = 'O';
	    playerTurn = '1';
	}

	else if((blockTwo == 'X' && blockEight == 'X') && playerTurn == '0'
	   && blockFive == '5') //2 - 8 = 5 vertical row 2
	{
	    blockFive = 'O';
	    playerTurn = '1';
	}

	else if((blockFive == 'X' && blockEight == 'X') && playerTurn == '0'
	   && blockTwo == '2') //5 - 8 = 2 vertical row 2
	{
	    blockTwo = 'O';
	    playerTurn = '1';
	}
    }

    else if((playerChoice == 3 || playerChoice == 6 || playerChoice == 9)
       && playerTurn == '0')
    {
	if((blockThree == 'X' && blockSix == 'X') && playerTurn == '0'
	   && blockNine == '9') //3 - 6 = 9 vertical row 3
	{
	    blockNine = 'O';
	    playerTurn = '1';
	}

	else if((blockThree == 'X' && blockNine == 'X') && playerTurn == '0'
	   && blockSix == '6') //3 - 9 = 6 vertical row 3
	{
	    blockSix = 'O';
	    playerTurn = '1';
	}

	else if((blockSix == 'X' && blockNine == 'X') && playerTurn == '0'
	   && blockThree == '3') //6 - 9 = 3 vertical row 3
	{
	    blockThree = 'O';
	    playerTurn = '1';
	}
    }
    else
    {
	do
	{

	    if(blockOne == '1' && playerTurn == '0')
	    {
		playerTurn = '1';
		blockOne = 'O';
	    }
	    else if(blockTwo == '2' && playerTurn == '0')
	    {
		playerTurn = '1';
		blockTwo = 'O';
	    }
	    else if(blockThree == '3' && playerTurn == '0')
	    {
		playerTurn = '1';
		blockThree = 'O';
	    }
	    else if(blockFour == '4' && playerTurn == '0')
	    {
		playerTurn = '1';
		blockFour = 'O';
	    }
	    else if(blockFive == '5' && playerTurn == '0')
	    {
		playerTurn = '1';
		blockFive = 'O';
	    }
	    else if(blockSix == '6' && playerTurn == '0')
	    {
		playerTurn = '1';
		blockSix = 'O';
	    }
	    else if(blockSeven == '7' && playerTurn == '0')
	    {
		playerTurn = '1';
		blockSeven = 'O';
	    }
	    else if(blockEight == '8' && playerTurn == '0')
	    {
		playerTurn = '1';
		blockEight = 'O';
	    }
	    else if(blockNine == '9' && playerTurn == '0')
	    {
		playerTurn = '1';
		blockNine = 'O';
	    }
	}
	while(playerTurn == '0');
    }
    return 0;
}
/*****************************************************************************
   MAIN PART FUNCTION COMPUTER AI ENDS HERE.
******************************************************************************/

//********** FUNCTION FOR THE PLAYER INPUT. *********************************
int checkPlayerInput()
{
    if(playerChoice == 1 && blockOne == '1')
        blockOne = 'X';
    else if(playerChoice == 2 && blockTwo == '2')
	blockTwo = 'X';
    else if(playerChoice == 3 && blockThree == '3')
	blockThree = 'X';
    else if(playerChoice == 4 && blockFour == '4')
	blockFour = 'X';
    else if(playerChoice == 5 && blockFive == '5')
	blockFive = 'X';
    else if(playerChoice == 6 && blockSix == '6')
	blockSix = 'X';
    else if(playerChoice == 7 && blockSeven == '7')
	blockSeven = 'X';
    else if(playerChoice == 8 && blockEight == '8')
	blockEight = 'X';
    else if(playerChoice == 9 && blockNine == '9')
	blockNine = 'X';
    return 0;
}

//********************* FUNCTION FOR THE COMPUTER INPUT. *********************
int checkComputerInput()
{
    if(computerPick == 1 && blockOne == '1')
	blockOne = 'O';
    else if(computerPick == 2 && blockTwo == '2')
	blockTwo = 'O';
    else if(computerPick == 3 && blockThree == '3')
	blockThree = 'O';
    else if(computerPick == 4 && blockFour == '4')
	blockFour = 'O';
    else if(computerPick == 5 && blockFive == '5')
	blockFive = 'O';
    else if(computerPick == 6 && blockSix == '6')
	blockSix = 'O';
    else if(computerPick == 7 && blockSeven == '7')
	blockSeven = 'O';
    else if(computerPick == 8 && blockEight == '8')
	blockEight = 'O';
    else if(computerPick == 9 && blockNine == '9')
	blockNine = 'O';
    return 0;
}

//***********FUNCTION TO DRAW THE BOARD FOR THE COMPUTER AI. *****************
void gameBoard()
{
    cout<<"+-----+-----+-----+"<<"\n";
    cout<<"|  "<<blockOne<< "  |  "<<blockTwo<<"  |  "<<blockThree<<"  |"<<"\n";
    cout<<"+-----+-----+-----+"<<"\n";
    cout<<"|  "<<blockFour<< "  |  "<<blockFive<<"  |  "<<blockSix<<"  |"<<"\n";
    cout<<"+-----+-----+-----+"<<"\n";
    cout<<"|  "<<blockSeven<< "  |  "<<blockEight<<"  |  "<<blockNine<<"  |"<<"\n";
    cout<<"+-----+-----+-----+"<<"\n";
}

//********** FUNCTION TO CHECK FOR AI IF IT IS A TIE OR NOT. *****************
int checkTie()
{
    if(blockOne != '1' && blockTwo != '2' && blockThree != '3' && blockFour != '4' && blockFive != '5' && blockSix != '6' && blockSeven != '7' && blockEight != '8' && blockNine != '9')
    {
	cout << "It's a tie!" << "\n";
	gameWin = 0;
    }
    //Check on this line since it doesnt work..
    return 0;
}

//******************************************* MAIN CODE STARTS HERE. **************************************************
int main()
{
	clrscr();
	int choose,again;
	cout<<"How would you like to play it as : \n 1. Multi Player. \n 2. Single Players. \n Enter your choice: ";
	cin>>choose;
	switch(choose)
	{
		case 1: int player = 1,i,choice;
			char mark;
			clrscr();
			do
			{
				do
				{
					board();
					player=(player%2)?1:2;
					cout << "Player " << player << ", enter a number:  ";
					cin >> choice;
					mark=(player == 1) ? 'X' : 'O';
					if (choice == 1 && square[1] == '1')
						square[1] = mark;
					else if (choice == 2 && square[2] == '2')
					square[2] = mark;
					else if (choice == 3 && square[3] == '3')
						square[3] = mark;
					else if (choice == 4 && square[4] == '4')
						square[4] = mark;
					else if (choice == 5 && square[5] == '5')
						square[5] = mark;
					else if (choice == 6 && square[6] == '6')
						square[6] = mark;
					else if (choice == 7 && square[7] == '7')
						square[7] = mark;
					else if (choice == 8 && square[8] == '8')
						square[8] = mark;
					else if (choice == 9 && square[9] == '9')
						square[9] = mark;
					else
					{
						cout<<"Invalid move ";
						player--;
						getch();
					}
					i=checkwin();
					player++;
				}while(i==-1);
				board();
				if(i==1)
					cout<<"==>\aPlayer "<<--player<<" win ";
				else
					cout<<"==>\aGame draw";
				getch();
				cout<<"\n Wolud you like to play again? \n 1. Yes \n 2. No \n Enter your choice: ";
				cin>>again;
			}while(again==1);
			break;
		case 2:     //RNGs
			    srand(time(0));
			    int playAgain;
			    int playerScore = 0;
			    int computerScore = 0;
			    int ties = 0;
			    do
			    {
				system("CLS");
				turnFirst = rand()% (2 - 1 + 1)+1;//generates starting person.
				computerRandomPick = rand()% (9 - 1 + 1)+1;//computer first pick - random
				gameWin = 3;
				blockOne = '1';
				blockTwo = '2';
				blockThree = '3';
				blockFour = '4';
				blockFive = '5';
				blockSix = '6';
				blockSeven = '7';
				blockEight = '8';
				blockNine = '9';
			
				//BEGIN OF PROGRAM
				cout << "Welcome to Tic Tac Toe!" <<"\n"<< "\n";
				cout << "Player: " << playerScore << " Computer: "<< computerScore << " Ties: " << ties << "\n";

				if(turnFirst == 1)//player first
				{
				    cout << "Please choose a grid to place (X): "<<"\n"<<"\n";
				    gameBoard();//Gameboard for tic tac toe
				    while (!(cin >> playerChoice)) //error traps letters and words
				    {
					cout << "\n";
					cout << "Numbers only." << "\n";
					cin.clear();
					cin.ignore(10000,'\n');
				    }
				    checkPlayerInput();
				    system("CLS");
				    gameBoard();
				    playerTurn = '0'; //switches to computer
				}

				if(turnFirst == 2)//Computer first
				{
				    computerRandomPick;
				    computerPick = computerRandomPick;
				    checkComputerInput();
				    cout << "The computer is choosing...\n" << "\n";
				    playerTurn = '1';
				    gameBoard();
				}


				do
				{
				    if(playerTurn == '1') //player loop
				    {
					cout << "Please choose a grid to place (X): "<<"\n"<<"\n";
					while (!(cin >> playerChoice)) //error traps letters and words
					{
					    cout << "\n";
					    cout << "Numbers only." << "\n";
					    cin.clear();
					    cin.ignore(10000,'\n');
					}
					checkPlayerInput();
					checkWinPlayer();
					checkTie();
					playerTurn = '0';
				    }

				    if(playerTurn == '0') //computer loop
				    {
					computerAI();
					system("CLS");
					gameBoard();
					checkWinComputer();
					checkTie();
					playerTurn = '1';
				    }

				}
				while(gameWin > 2);

				if(gameWin == 0)
				{
				    cout << "The game is a Tie!" << "\n";
				    ++ties;
				}


				if(gameWin == 1)
				{
				    cout << "The player wins!" << "\n";
				    ++playerScore;
				}

				if(gameWin == 2)
				{
				    cout << "The computer wins!" << "\n";
				    ++computerScore;
				}


				cout << "Player: " << playerScore << " "<< "Computer: " << computerScore << " Ties: "<< ties << "\n";


				cout << "Play again?\n1. Yes\n2. No\n" << "\n";

				while (!(cin >> playAgain)) //error traps letters and words
				{
				    cout << "\n";
				    cout << "Play again? \n1. Yes \n2. No \n Enter your choice: " << "\n";
				    cin.clear();
				    cin.ignore(10000,'\n');
				}


			    }
			    while(playAgain == 1);

			    return 0;


	default: "Wrong Input!!!";
		 break;
	}
	getch();
	return 0;
}
//*********************************************MAIN CODE ENDS HERE. *****************************************************

/*********************************************
	FUNCTION TO RETURN GAME STATUS
	1 FOR GAME IS OVER WITH RESULT
	-1 FOR GAME IS IN PROGRESS
	O GAME IS OVER AND NO RESULT
**********************************************/

int checkwin()
{
	if (square[1] == square[2] && square[2] == square[3])
		return 1;
	else if (square[4] == square[5] && square[5] == square[6])
		return 1;
	else if (square[7] == square[8] && square[8] == square[9])
		return 1;
	else if (square[1] == square[4] && square[4] == square[7])
		return 1;
	else if (square[2] == square[5] && square[5] == square[8])
		return 1;
	else if (square[3] == square[6] && square[6] == square[9])
		return 1;
	else if (square[1] == square[5] && square[5] == square[9])
		return 1;
	else if (square[3] == square[5] && square[5] == square[7])
		return 1;
	else if (square[1] != '1' && square[2] != '2' && square[3] != '3' && square[4] != '4' && square[5] != '5' && square[6] != '6' && square[7] != '7' && square[8] != '8' && square[9] != '9')
		return 0;
	else
		return -1;
}


/*******************************************************************
     FUNCTION TO DRAW BOARD OF TIC TAC TOE WITH PLAYERS MARK
********************************************************************/


void board()
{
	clrscr();
	cout << "\n\n\tTic Tac Toe\n\n";
	cout << "Player 1 (X)  -  Player 2 (O)" << "\n" << "\n";
	cout << "\n";
	cout << "     |     |     " << "\n";
	cout << "  " << square[1] << "  |  " << square[2] << "  |  " << square[3] << "\n";
	cout << "_____|_____|_____" << "\n";
	cout << "     |     |     " << "\n";
	cout << "  " << square[4] << "  |  " << square[5] << "  |  " << square[6] << "\n";
	cout << "_____|_____|_____" << "\n";
	cout << "     |     |     " << "\n";
	cout << "  " << square[7] << "  |  " << square[8] << "  |  " << square[9] << "\n";
	cout << "     |     |     " << "\n" << "\n";
}

/**********************************************************************
				END OF PROJECT
***********************************************************************/