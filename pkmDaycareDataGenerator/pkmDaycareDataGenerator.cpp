// pkmDaycareDataGenerator.cpp 
// Wrote to generate data for my database project


#include <iostream>
#include <fstream>
#include <sstream>

using namespace std; 

const string FILE_NAME = "eggData.csv";

int main()
{
   string fileName;
   cout << "What data would you like to generate:" << endl;
   cin >> fileName; 

   ifstream input;
   string line;

   input.open(FILE_NAME);
   if (!input.fail()) {

   }
   
   return 0; 
}