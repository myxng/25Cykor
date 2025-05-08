#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/wait.h>
#include <fcntl.h>

#define BUFSIZE 1024
#define MAX_ARGS 128

void run_pipe();
void run_logic();
void run_cd();
void run_pwd();

void print_prompt()
{
    char cwd[BUFSIZE];
    if (getcwd(cwd, sizeof(cwd)) == NULL) 
    {
        perror("getcwd");
        exit(1);
    }

    char *dir_name = strrchr(cwd, '/');
    if (dir_name != NULL) dir_name++;
    else dir_name = cwd;

    printf("[%s]$ ", dir_name);
    fflush(stdout);
}

void analysis_prompt(char *line)
{
    char* cwd[MAX_ARGS];
    
    if (strchr(line, '|')) {
        run_pipe(line);
        return;
    }

    if (run_logic(line)) return;

    char *args[MAX_ARGS];
    int i = 0;
    args[i] = strtok(line, " \n");
    while (args[i] != NULL) args[++i] = strtok(NULL, " \n");
    if (args[0] == NULL) return;

    int bg = is_background(args, i);
    if (strcmp(args[0], "cd") == 0) run_cd(args);
    else if (strcmp(args[0], "pwd") == 0) run_pwd();
    else if (strcmp(args[0], "exit") == 0) exit(0);
    else printf("Unsupported command: %s\n", args[0]);

}

int main() 
{
    char line[BUFSIZE];
    
    while (1)
    {
        print_prompt();
        if (fgets(line, BUFSIZE, stdin) == NULL) break;

        char* cmd = strtok(line, ";");
        while (cmd != NULL)
        {
            analysis_prompt(cmd);
            cmd = strtok(NULL, ";");
        }
    }

    return 0;
}