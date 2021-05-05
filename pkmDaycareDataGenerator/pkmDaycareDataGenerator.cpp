// pkmDaycareDataGenerator.cpp 
// Wrote to generate data for my database project


#include <iostream>
#include <fstream>
#include <sstream>
#include <vector>

using namespace std; 

const string FILE_NAME = "eggData.csv";

int main()
{
   string fileName;

   cout << "What data would you like to generate:";
   cin >> fileName; 

   vector<string> result; 
   stringstream ss; 
   ifstream input;
   string line;

   input.open(FILE_NAME);
   if (!input.fail()) {
     while (getline(input, line)) {
       ss.str(line);
       while (ss.good()) {
         string substr;
         getline(ss, substr, ',');
         result.push_back(substr);
       }
       for (int index = 0; index < result.size(); index++) {
         cout << result[index] << " ";
       }

       ss.clear();
     }
 
   }
   else {
     cout << endl << "Failed to read file. Exiting program...." << endl;
   }
   
   return 0; 
}