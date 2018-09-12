<?hh // strict

use type Facebook\CLILib\CLIWithArguments;
use namespace Facebook\CLILib\CLIOptions;

final class TruncateOutputCLI extends CLIWithArguments {

	<<__Override>>
	public async function mainAsync(): Awaitable<int> {

		$kb = str_repeat(".", 1023) . "\n";
		$output = str_repeat($kb, 4);
		$bytes = strlen($output);
		$bytes_written = $this->getTerminal()->getStdout()->write($output);

		// Same issue occurs with
		// echo str_repeat($kb, 4);

		echo "\n";
		echo "Bytes: " . strlen($output) . "\n";
		echo "Written: " . $bytes_written . "\n";

		return $bytes === $bytes_written ? 0 : 1;
	}

	public function getSupportedOptions(): vec<CLIOptions\CLIOption> {
		return vec[];
	}
}
