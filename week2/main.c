#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/wait.h>
#include <fcntl.h>

#define BUFSIZE 1024
#define MAX_ARGS 128

void print_prompt();
void run_pipe();
void run_logic();
void run_cd(char** args);
void run_pwd();
void is_background(char* args, int i);
void analysis_prompt(char *line);

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
            // 앞뒤 공백 제거
            while (*cmd == ' ' || *cmd == '\t') cmd++;
            char *end = cmd + strlen(cmd) - 1;
            while (end > cmd && (*end == ' ' || *end == '\t' || *end == '\n')) {
                *end = '\0';
                end--;
            }
    
            // 셸 내부 명령어는 부모 프로세스에서 직접 처리
            if (strncmp(cmd, "cd", 2) == 0 || strncmp(cmd, "pwd", 3) == 0 || strncmp(cmd, "exit", 4) == 0) {
                analysis_prompt(cmd);
            } else {
                // 자식 프로세스를 사용하지 않고 부모에서 처리
                analysis_prompt(cmd);
            }
    
            cmd = strtok(NULL, ";");
        }
    }   

    return 0;
}

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
    if (strchr(line, '|')) 
    {
        // run_pipe(line);
        return;
    }

    if (strstr(line, "&&")!=NULL || strstr(line, "||")!=NULL)
    {
        // run_logic(line);
        return;
    }

    char *args[MAX_ARGS];
    int i = 0;
    args[i] = strtok(line, " \n");
    while (args[i] != NULL)
        args[++i] = strtok(NULL, " \n");
    if (args[0] == NULL) return;

    //int bg = is_background(args, i);
    if (strcmp(args[0], "cd") == 0) run_cd(args);
    else if (strcmp(args[0], "pwd") == 0) run_pwd();
    else if (strcmp(args[0], "exit") == 0) exit(0);
    else printf("Unsupported command: %s\n", args[0]);
}

void run_cd(char** args)
{
    if (args[1]==NULL)
    {
        fprintf(stderr, "Error: cd argument doesn't exist.\n");
        return;
    }
    
    if (strcmp(args[1],"~")==0)
    {
        if (chdir(getenv("HOME"))!=0) perror("cd");
        return;
    }

    if (chdir(args[1])!=0)
        printf("Error: cd failed to change directory to %s.\n", args[1]);

    return;
}

void run_pwd()
{
    char cwd[BUFSIZE];
    if (getcwd(cwd, sizeof(cwd)) != NULL)
        printf("%s\n", cwd);
    else
        perror("pwd");
}