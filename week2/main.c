#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/wait.h>
#include <fcntl.h>

#define BUFSIZE 1024

void print_prompt()
{
    char cwd[BUFSIZE];
    if (getcwd(cwd, sizeof(cwd)) == NULL) {
        perror("getcwd");
        exit(1);
    }

    char *dir_name = strrchr(cwd, '/');
    if (dir_name != NULL) dir_name++;
    else dir_name = cwd;

    printf("[%s]$ ", dir_name);
    fflush(stdout);
}

int main() 
{
    char line[BUFSIZE];
    
    while (1)
    {
        print_prompt();
        if (fgets(line, BUFSIZE, stdin) == NULL) break;

        printf("Command: %s\n", line);
        char* cmd = strtok(line, ";");
        while (cmd != NULL)
        {
            printf("After tokenized: %s\n", cmd);
            cmd = strtok(NULL, ";");
        }
    }

    return 0;
}