#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/wait.h>
#include <fcntl.h>

int main() {
    char line[1024];

    while (1) {
        printf("my_shell$ ");
        if (fgets(line, sizeof(line), stdin) == NULL) break;
        printf("Command: %s", line);
    }

    return 0;
}